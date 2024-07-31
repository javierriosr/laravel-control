<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Esta opción define el "guard" de autenticación y el "broker" de
    | restablecimiento de contraseña predeterminados para tu aplicación.
    | Puedes cambiar estos valores según sea necesario, pero son un
    | buen comienzo para la mayoría de las aplicaciones.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir cada guard de autenticación para tu aplicación.
    | Se ha definido una configuración predeterminada que utiliza el
    | almacenamiento de sesiones más el proveedor de usuarios de Eloquent.
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios,
    | que define cómo se obtienen realmente los usuarios de tu base de datos
    | u otro sistema de almacenamiento utilizado por la aplicación.
    | 
    | Soportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Todos los guards de autenticación tienen un proveedor de usuarios,
    | que define cómo se obtienen realmente los usuarios de tu base de datos
    | u otro sistema de almacenamiento utilizado por la aplicación.
    |
    | Si tienes múltiples tablas o modelos de usuarios, puedes configurar
    | múltiples proveedores para representar cada modelo o tabla.
    | Estos proveedores pueden asignarse a cualquier guard de autenticación
    | adicional que hayas definido.
    |
    | Soportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración especifican el comportamiento de
    | la funcionalidad de restablecimiento de contraseña de Laravel,
    | incluyendo la tabla utilizada para el almacenamiento de tokens
    | y el proveedor de usuarios que se invoca para obtener los usuarios.
    |
    | El tiempo de expiración es el número de minutos que cada token de
    | restablecimiento será considerado válido. Esta característica de
    | seguridad mantiene los tokens de corta duración, por lo que tienen
    | menos tiempo para ser adivinados. Puedes cambiar esto según sea necesario.
    |
    | La configuración de "throttle" es el número de segundos que un usuario
    | debe esperar antes de generar más tokens de restablecimiento de contraseña.
    | Esto evita que el usuario genere rápidamente una gran cantidad de tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir la cantidad de segundos antes de que una ventana
    | de confirmación de contraseña expire y se les pida a los usuarios
    | que vuelvan a ingresar su contraseña a través de la pantalla de confirmación.
    | Por defecto, el tiempo de espera dura tres horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
