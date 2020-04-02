<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    function redirUrl() {
        //return config('backpack.base.route_prefix').'/dashboard'; <- Antes
        return redirect('http://exiled.local/'.config('backpack.base.route_prefix').'/dashboard');
    }
    // Deshabilitamos las rutas para la informacion de la cuenta
    Route::get('edit-account-info',function () { return redirUrl();  } )->name ('backpack.account.info');
    Route::post('edit-account-info', function () { return redirUrl();  } );
    Route::get('change-password', function () { return redirUrl();  } )->name('backpack.account.password');
    Route::post('change-password', function () { return redirUrl();  } );
    // Deshabilitamos las rutas para el reseteo de password
    Route::get('password/reset', function () { return redirUrl();  })->name('backpack.auth.password.reset');
    Route::post('password/reset', function () { return redirUrl();  });
    Route::get('password/reset/{token}', function () { return redirUrl();  })->name('backpack.auth.password.reset.token');
    Route::post('password/email', function () { return redirUrl();  })->name('backpack.auth.password.email');
    // Deshabilitamos las rutas para el registro (teoricamente esto ya se hace en config/backpack/base.php pero por si acaso )
    Route::get('register', function () { return redirUrl();  } )->name('backpack.auth.register');
    Route::post('register', function () { return redirUrl();  } );

    Route::crud('grupo', 'GrupoCrudController');
    Route::crud('categoria', 'CategoriaCrudController');
}); // this should be the absolute last line of this file