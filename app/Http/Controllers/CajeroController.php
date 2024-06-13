<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Retiro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_logged = Auth::user();
        $monto_retirar = $request->input('monto', 0);
        $total = $this->contarBilletes($monto_retirar);
        if (!$user_logged) {
            return redirect()->route('login');
        }

        return inertia('Cajero/index', [
            'total' => $total,
            'saldo' => $user_logged->saldo ?? 0,
            'name' => $user_logged->name,
            'user_id' => $user_logged->id,
        ]);
    }

    /**
    * Metodo al retirar dinero
    */
    public function retirarDinero($request)
    {
       // dd($request);
       $user_logged = ((null !== Auth::user())&& !empty(Auth::user())) ? Auth::user() : User::findOrFail($request->input('id_user')) ;
       $monto_retirar = $request->input('monto');

        if ($monto_retirar >= 1000 && $monto_retirar <= 2000000) {
            if ($monto_retirar <= $user_logged->saldo) {
                $this->crearRetiro($user_logged, $monto_retirar, true );
                $this->actualizarSaldoUsuario($user_logged, $monto_retirar);
                return back()->with('status', 'Retiro exitoso.');
            }else {
                $this->crearRetiro($user_logged, $monto_retirar, false );
                 return back()->with('status', 'Saldo insuficiente.');
                // return inertia('Cajero/index',
                // ['respuesta' => "Saldo insuficiente. "]);

            }
        }else {
            return back()->with('status', 'Valor ingresado no permitido. Monto mínimo $1.000 y máximo $2.000.000.');
            // return inertia('Cajero/index',
            // ['respuesta' => "Valor ingresado no permitido. Monto mínimo $1.000 y máximo $2.000.000"]);
        }
    }

    /**
     * Crea registro en tabla retiro
     */
    public function crearRetiro($user_logged, $monto_retirar, $estado )
    {

        $estado = ($estado == true) ? "retiro exitoso" : "fondos insuficientes" ;
       $retiro_created =  Retiro::create( [
        'user_id'  => $user_logged->id,
        'fecha'    => Carbon::now(),
        'cantidad' => $monto_retirar,
        'estado'   => $estado
        ]);
       // dd($retiro_created);
        return true;
    }

     /**
     * Actualiza el saldo del usuario logueado
     */
    public function actualizarSaldoUsuario($user_logged, $monto_retirar)
    {
        $user_logged->saldo = $user_logged->saldo - $monto_retirar;
        $user_logged->save();
        return true;
    }

    public function contarBilletes($monto_retirar)
    {
        $denominaciones =
        [
            'cincuenta_mil'=>50000,
            'veinte_mil'=>20000,
            'diez_mil'=> 10000,
            'cinco_mil'=>5000,
            'dos_mil'=>2000,
            'mil'=>1000
        ];
        $billetes =
        [
            'mil' => 0,
            'dos_mil' => 0,
            'cinco_mil' => 0,
            'diez_mil' => 0,
            'veinte_mil' => 0,
            'cincuenta_mil' => 0
        ];

        foreach ($denominaciones as $nombre => $valor) {
            if ($monto_retirar >= $valor) {
                //$cuantos = $monto_retirar/$valor;
                //$total_ = $cuantos * $valor;
                //$final = $monto_retirar - $total_;
                $cantidad_billetes = intdiv($monto_retirar, $valor);
                $monto_retirar = $monto_retirar -( $cantidad_billetes * $valor);
                $billetes[$nombre] = $cantidad_billetes;
            }
        }
        return $billetes;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     $this->retirarDinero($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
