<?php
/**
 *
 * Data e hora: 2020-09-23 09:39:57
 * Controller/Web gerada automaticamente
 *
 */


namespace Agp\UserPreferences\Controller\Web;


use Agp\UserPreferences\Controller\Controller;
use Agp\UserPreferences\UserPreferences;
use Illuminate\Http\Request;


class UserPreferenceController extends Controller
{
    public function get()
    {
        $preferencias = null;
        if (auth()->check() && auth()->user()->usuarioPreferencias) {
            if (auth()->user()->usuarioPreferencias->get(0)) {
                $valor = json_decode(auth()->user()->usuarioPreferencias->get(0)->valor, true);
                if ($valor)
                    $preferencias = new UserPreferences($valor);
            }
        }
        return view('settings', ['preferencias' => $preferencias])->render();
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
