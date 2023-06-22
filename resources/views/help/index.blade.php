<style>
    h2{
    font-family: poppinsmedium;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 style="text-align: center">Precisa de Ajuda?</h2>
                    <h2 style="text-align: center">Entre em contato conosco</h2>

                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-4">
                          <div class="card">
                            <img class="card-img-top" src="imgs/maisMAguinho.png" width="75" height="65" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Plano Básico</h5>
                              <p class="card-text">R$9,90/mês</p>
                              <a href="#" class="btn btn-primary">Assinar</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card">
                            <img class="card-img-top" src="imgs/meiaBomba.png" width="75" height="65" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Plano Pro</h5>
                              <p class="card-text">R$34,90/mês</p>
                              <a href="#" class="btn btn-primary">Assinar</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card">
                            <img class="card-img-top" src="imgs/pesoBIG.png" width="75" height="65" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Plano Ultimate</h5>
                              <p class="card-text">R$59,90/mês</p>
                              <a href="#" class="btn btn-primary">Assinar</a>
                            </div>
                          </div>
                        </div>
                      </div>

            </div>
        </div>
    </div>
</x-app-layout>
