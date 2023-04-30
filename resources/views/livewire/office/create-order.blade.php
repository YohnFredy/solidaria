<div>

    <style>
        .color {
            max-width: 100ex;
        }
    </style>

    <x-btn wire:click="pagar"> Finalizar Compra</x-btn>

    <x-dialog-modal maxWidth="7x1" wire:model="modal">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <div class=" text-lg text-gray-700 text-center font-medium ">
                Producto añadido correctamente a su carrito de compra.
            </div>
            <hr>

            <div class=" grid grid-cols-6 gap-4">
                <div class=" col-span-2 my-4 border-r-2">

                    <div class=" grid grid-cols-2 gap-4">
                        <div class=" col-span-1">
                            <img class="w-full rounded-lg " src="https://www.ecured.cu/images/9/9a/Solidaridad-Humana.jpg"
                                alt="image description">
                        </div>

                        <div class=" col-span-1">
                            <h1 class=" text-lg font-bold uppercase text-gray-900 mb-4">Rifa Solidaria</h1>
                            <h1 class=" text-lg font-semibold text-red-500 mb-4">$15.00 </h1>
                            <h1 class=" text-gray-800 font-bold">Cant: 1</h1>
                        </div>
                    </div>

                </div>



                <div class=" flex items-center col-span-4">
                    <table class=" w-full  text-left text-gray-500 dark:text-gray-400">

                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Subtotal:
                                </th>
                                <td class="px-6 py-4 text-right">
                                    $15.00
                                </td>

                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Total (impuestos inc.)
                                </th>
                                <td class="px-6 py-4 text-right">
                                    $15.00
                                </td>

                            </tr>


                        </tbody>
                    </table>
                </div>




            </div>
        </x-slot>

        <x-slot name="footer">
            <div>
                <x-btn wire:click="save_sale">
                    Pagar
                </x-btn>
            </div>
        </x-slot>
    </x-dialog-modal>


























    <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
        <input name="merchantId" type="hidden" value="{{-- {{ $merchantId }} --}}">
        <input name="accountId" type="hidden" value="512321">
        <input name="description" type="hidden" value="Venta en linea">
        <input name="referenceCode" type="hidden" value="{{-- {{ $referenceCode }} --}}">
        <input name="amount" type="hidden" value="15">
        <input name="tax" type="hidden" value="0">
        <input name="taxReturnBase" type="hidden" value="0">
        <input name="currency" type="hidden" value="USD">
        <input name="signature" type="hidden" value="{{-- {{ $signature }} --}}">
        <input name="test" type="hidden" value="1">
        <input name="buyerEmail" type="hidden" value="{{-- {{ $user->email }} --}}">
        <input name="responseUrl" type="hidden" value="https://octopus-app-zutpq.ondigitalocean.app/response-payu">
        <input name="confirmationUrl" type="hidden"
            value="https://octopus-app-zutpq.ondigitalocean.app/confirmation-payu">
        {{-- <input name="Submit"          type="submit"  value="Send" > --}}
        {{-- <x-btn name="Submit">Enviar</x-btn> --}}
        {{--  hola --}}
    </form>
    {{--  {{ $signature }} --}}
</div>

