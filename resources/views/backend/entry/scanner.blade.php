@extends('backend.entry.layouts.app')

@section('content')

<style>
   #qr-reader__dashboard_section_swaplink {
       display: ;
   } 
</style>

    <section class="section-style scan-code-section">
    
        <div class="container">
        
            <div class=" bounded-area">
            
                <div class="scan-code-area">

                    <div id="qr-reader" class=" qr_reader"></div>
                    
                    <div id="qr-reader-results" class=" qr_reader_results"></div>
                    

                    <a class="back-btn duplicated-btn" href="{{route('entry.dashboard')}}">الرجوع للرئيسية</a>
                </div>
            
            </div>
        
        </div>
    
    </section>

@endsection

@push('scripts')

<script src="{{asset('backend/entry')}}/js/html5-qrcode.min.js"></script>
<script>
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                window.location=decodedText;
                //console.log('Scan result ${decodedText}', decodedResult);
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
@endpush