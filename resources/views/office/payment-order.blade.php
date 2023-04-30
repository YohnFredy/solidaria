<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">

        @php
            
        @endphp

        <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
           
            <input name="merchantId" type="hidden" value="{{ $merchantId }}">
            <input name="accountId" type="hidden" value="512321">
            <input name="description" type="hidden" value="Venta en linea">
            <input name="referenceCode" type="hidden" value="{{ $referenceCode }}">
            <input name="amount" type="hidden" value="15">
            <input name="tax" type="hidden" value="0">
            <input name="taxReturnBase" type="hidden" value="0">
            <input name="currency" type="hidden" value="USD">
            <input name="signature" type="hidden" value="{{ $signature }}">
            <input name="test" type="hidden" value="1">
            <input name="buyerEmail" type="hidden" value="{{ $user->email }}">
            <input name="responseUrl" type="hidden" value="https://octopus-app-zutpq.ondigitalocean.app/response-payu">
            <input name="confirmationUrl" type="hidden" value="https://octopus-app-zutpq.ondigitalocean.app/confirmation-payu">
            {{-- <input name="Submit"          type="submit"  value="Send" > --}}
            <x-btn name="Submit">Enviar</x-btn>
           {{--  hola --}}
        </form>
        {{ $signature }}
    </div>
    <br>


</x-app-Layout>