<?php

namespace App\Providers;

use App\Constants\UserConstant;
use App\Http\Middleware\Authenticate;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;

class MountOptionsNavProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @param Dispatcher $events
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = Auth::user();
            if($user->user_type_id === UserConstant::ADMIN){
                $event->menu->add(
                    [
                        'text' => 'search',
                        'search' => false,
                        'topnav' => false,
                    ],
                    [
                        'text'        => 'Incio',
                        'url'         => 'home',
                        'icon'        => 'fas fa-fw fa-home',
                    ],
                    ['header' => 'Usuários'],
                    [
                        'text' => 'Gerenciar usuários',
                        'icon' => 'fas fa-fw fa-user',
                        'submenu' => [
                            [
                                'text' => 'Listagem de usuários',
                                'url'  => 'user'
                            ],
                            [
                                'text' => 'Inserir usuário',
                                'url'  => 'user/create'
                            ]
                        ]
                    ],
                    ['header' => 'Gerenciamento de pacientes'],
                    [
                        'text' => 'Pacientes',
                        'icon' => 'fa fa-cogs',
                        'submenu' => [
                            [
                                'text' => 'Inserir dados',
                                'url'  => 'timeline'
                            ],
                            [
                                'text' => 'Listagem de pacientes',
                                'url'  => 'user/patients'
                            ],
                        ]
                    ]

                );
                return true;
            }
            if($user->user_type_id === UserConstant::DOCTOR){
                $event->menu->add(
                    [
                        'text' => 'search',
                        'search' => false,
                        'topnav' => false,
                    ],
                    [
                        'text'        => 'Incio',
                        'url'         => 'home',
                        'icon'        => 'fas fa-fw fa-home',
                    ],
                    ['header' => 'Usuários'],
                    [
                        'text' => 'Gerenciar usuários',
                        'icon' => 'fas fa-fw fa-user',
                        'submenu' => [
                            [
                                'text' => 'Inserir paciente',
                                'url'  => 'user/createPatient'
                            ]
                        ]
                    ],
                    ['header' => 'Gerenciamento de pacientes'],
                    [
                        'text' => 'Pacientes',
                        'icon' => 'fa fa-cogs',
                        'submenu' => [
                            [
                                'text' => 'Inserir dados',
                                'url'  => 'timeline'
                            ],
                            [
                                'text' => 'Listagem de pacientes',
                                'url'  => 'user/patients'
                            ],
                        ]
                    ]

                );
                return true;
            }
            $event->menu->add(
                ['header' => 'Meu acompanhamento'],

                [
                    'text' => 'Meu Perfil',
                    'url'  => 'patient'
                ],
                [
                    'text' => 'Meu histórico',
                    'url'  => 'timeline/'.$user->id
                ]
            );

        });

    }
}
