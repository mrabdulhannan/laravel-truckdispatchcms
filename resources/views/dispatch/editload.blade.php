@extends('layouts.app')

@push('stylesheet-page-level')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    form {
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .label {
        margin-bottom: 8px;
        font-weight: bold;
    }

    .inputfull {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 50px;
        height: 2%;
        flex-wrap: wrap;
    }



    input[type="submit"] {
        background-color: #B41C43;
        color: #fff;
        cursor: pointer;

    }

    input[type="submit"]:hover {
        background-color: #a05668;
    }

    .ullist {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
</style>
@endpush

@section('content')
    <!-- Content wrapper scroll start -->
    <div class="content-wrapper-scroll">

        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- Row start -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Update Carrier</h2>

                            <form action="{{ route('updateCarrier', ['id' => $load->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                <label class="label" for="load">LOAD #</label>
                                <input type="text" class="inputfull" id="load" name="load" value="{{$load->load}}" required>

                                <label class="label" for="carrier">Carrier Company</label>
                                <input type="text" class="inputfull" id="carrier" name="carrier" value="{{$load->carrier}}" required>

                                <label class="label" for="name">NAME</label>
                                <input type="text" class="inputfull" id="name" name="name" value="{{$load->name}}" required>

                                <label class="label" for="date">DATE</label>
                                <input type="date" class="inputfull" id="date" name="date" value="{{$load->date}}" required>

                                <label class="label" for="broker">BROKER</label>
                                <input type="text" class="inputfull" id="broker" name="broker" value="{{$load->broker}}" required>

                                <label class="label" for="trip">TRIP</label>
                                <input type="text" class="inputfull" id="trip" name="trip" value="{{$load->trip}}" required>

                                <label class="label" for="amount">$ AMOUNT</label>
                                <input type="text" class="inputfull" id="amount" name="amount" value="{{$load->amount}}" required>

                                <label class="label" for="pudate">PU DATE</label>
                                <input type="date" class="inputfull" id="pudate" name="pudate" value="{{$load->pudate}}" required>

                                <label class="label" for="origindeldate">ORIGIN DEL DATE</label>
                                <input type="date" class="inputfull" id="origindeldate" name="origindeldate" value="{{$load->origindeldate}}" required>

                                <label class="label" for="destination">DESTINATION</label>
                                <input type="text" class="inputfull" id="destination" name="destination" value="{{$load->destination}}"required>

                                <label class="label" for="jobstatus">JOB STATUS</label>
                                <input type="text" class="inputfull" id="jobstatus" name="jobstatus" value="{{$load->jobstatus}}" required>

                                <label class="label" for="ratepermile">RATE PER MILE</label>
                                <input type="text" class="inputfull" id="ratepermile" name="ratepermile" value="{{$load->jobstatus}}" required>

                                <label class="label" for="agreement">AGREEMENT</label>
                                <input type="text" class="inputfull" id="agreement" name="agreement" value="{{$load->jobstatus}}" required>

                                <label class="label" for="dispatcher">DISPATCHER</label>
                                <input type="text" class="inputfull" id="dispatcher" name="dispatcher" value="{{$load->jobstatus}}" required>

                                <label class="label" for="profit">PROFIT</label>
                                <input type="text" class="inputfull" id="profit" name="profit" value="{{$load->jobstatus}}" required>

                                <label class="label" for="paid">PAID</label>
                                <input type="text" class="inputfull" id="paid" name="paid" value="{{$load->jobstatus}}" required>

                                <label class="label" for="remainingbalance">REMAINING BALANCE</label>
                                <input type="text" class="inputfull" id="remainingbalance" name="remainingbalance" value="{{$load->jobstatus}}"
                                    required>

                                <label class="label" for="invoicestatus">Invoice Status</label>
                                <input type="text" class="inputfull" id="dispatcher" name="invoicestatus" value="{{$load->jobstatus}}" required>

                                <label class="label" for="dispatcher">DISPATCHER</label>
                                <input type="text" class="inputfull" id="dispatcher" name="dispatcher" value="{{$load->jobstatus}}" required>

                                <br>
                                <br>


                                <label class="label" for="srno#">Sr No#</label>
                                <input type="text" class="inputfull" id="srno" name="srno" value="{{$load->jobstatus}}" required>


                                <label class="label" for="agentname">AGENT NAME</label>
                                <input type="text" class="inputfull" id="agentname" name="agentname" value="{{$load->jobstatus}}" required>


                                <label class="label" for="companyname">COMAPNY NAME</label>
                                <input type="text" class="inputfull" id="companyname" name="companyname" value="{{$load->jobstatus}}" required>


                                <label class="label" for="mc">MC</label>
                                <input type="text" class="inputfull" id="mc" name="mc" value="{{$load->jobstatus}}" required>


                                <label class="label" for="driverstruck">DRIVERS TRUCK TYPE</label>
                                <input type="text" class="inputfull" id="driverstruck" name="driverstruck" value="{{$load->jobstatus}}" required>


                                <label class="label" for="trucksstate">TRUCKS STATE</label>
                                <input type="text" class="inputfull" id="trucksstate" name="trucksstate" value="{{$load->jobstatus}}" required>


                                <label class="label" for="dispatcher">NAME</label>
                                <input type="text" class="inputfull" id="dispatcher" name="name" value="{{$load->jobstatus}}" required>


                                <label class="label" for="contact">CONTACT</label>
                                <input type="text" class="inputfull" id="contact" name="contact" value="{{$load->jobstatus}}" required>

                                <input type="submit" value="Submit" class="inputfull">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
@endpush
