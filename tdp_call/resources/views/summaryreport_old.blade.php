<!-- Extends the 'layouts.app' view template and begins the 'content' section -->
@extends('layouts.app')
<!-- Starts the 'content' section -->
@section('content')

<style>
.card { border: 0px solid rgba(0,0,0,.125) !important; }
.card-body { padding: 0rem !important; }
.card-header { border: 1px solid rgba(0,0,0,.125) !important; }
.mt-2, .my-2 {
    margin-top: .5rem !important;
    margin-left: 100px !important;
}

</style>


<!-- <script>
    // Function to reload the page
    function reloadPage() {
        location.reload();
    }

    // Set a timer to reload the page every 5000 milliseconds (5 seconds)
    setTimeout(reloadPage, 60000);
</script> -->


<div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 flex flex-col">               
    <div class="px-3" style="text-align: center; color:black; height: 50px; padding-top: 8px;">
       <h2 class="text-2xl font-medium" style="font-weight: bold;text-align: center;">Call Holding Report</h2>
	 <!-- <span class="mx-2 text-black text-xl uppercase font-bold"> Call Holding Report </span> -->
    </div>
    
    <div class="card">
        <div class="card-header">

		<!-- Date Filter Section -->
        <div class="row mt-2 justify-content-center" style="width: 100%;margin-left:100px !important;">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="d-flex align-items-center" style="line-height: 40px;">

            <div class="col col-md-2 text-right">
                <label><strong>From Date :</strong></label>
            </div>
            <div class="col col-md-2">
                <input type="date" name="summary_from_date" id="summary_from_date" class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" onblur="func_fixtodate()">
            </div>
            <div class="col col-md-2 text-right">
                <label><strong>To Date :</strong></label>
            </div>
            <div class="col col-md-2">
                <input type="date" name="summary_to_date" id="summary_to_date" class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" onblur="func_fixtodate()">
            </div>
            <div class="col col-md-2">
                <button type="submit" class="md:w-full bg-gray-900 text-white py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" id="summary_get_filter" style="width: 50%">Search</button>
            </div>

        </div>
    </div>
</div>


	<!-- Table Section -->
        <div class="col card-body table-responsive mt-4">
            <table class="summary_data-table hover stripe" id="summary_data-table"   style="width:100%">
                <thead>
                <tr>
                        <th>No.</th>
                         <th>Date</th>
                         @if(Auth::user()->user_master_id === 1)
                <th>User Name</th>
                @endif
                        <th>Campaign Name</th>
			<th>Particulars</th>
			<th>Pulse</th>
			<th>Dialled</th>
			<th>Success</th>
			<th>Success%</th>
                        <th class="word_break">1-10 Secs</th>
                        <th class="word_break">11-20 Secs</th>
                        <th class="word_break">21-30 Secs</th>
                        <th class="word_break">31-45 Secs</th>
                        <th class="word_break">46-60 Secs</th>
                    </tr>
                </thead>
                <tbody>
                   </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function func_fixtodate() 
    {
        var today = new Date();
        var from_date = document.getElementById('summary_from_date');
        var fromDateLimit = new Date(today);
        fromDateLimit.setDate(fromDateLimit.getDate() - 30); // 30 days ago

        from_date.setAttribute('max', today.toISOString().split('T')[0]); // today as max date
        from_date.setAttribute('min', fromDateLimit.toISOString().split('T')[0]); // November 11th as min date

        var frmdate = $("#summary_from_date").val();
        $('#summary_to_date').attr('min', frmdate);
    }

    function func_fixfrmdate() 
    {
        var today = new Date();
        var to_date = document.getElementById('summary_to_date');
        var toDateLimit = new Date(today);
        toDateLimit.setDate(toDateLimit.getDate() - 30); // 30 days ago

        to_date.setAttribute('max', today.toISOString().split('T')[0]); //today as max date
        to_date.setAttribute('min', toDateLimit.toISOString().split('T')[0]);

        var todate = $("#summary_to_date").val();
        $('#summary_from_date').attr('max', todate);
    }

    // Initialize dates on page load
    window.onload = function () {
        func_fixtodate();
        func_fixfrmdate();
    };
</script>

<!-- End of 'content' section -->
    @endsection
