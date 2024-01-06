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
                            <h2 class="card-title">Create Carrier</h2>

                            <form action="{{ route('storecarrier') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                <label class="label" for="companyName">Company Name</label>
                                <input type="text" class="inputfull" id="companyName" name="companyName" required>

                                <label class="label" for="dba">DBA (if any)</label>
                                <input type="text" class="inputfull" id="dba" name="dba">

                                <label class="label" for="address">Address</label>
                                <input type="text" class="inputfull" id="address" name="address" required>

                                <label class="label" for="streetAddress">Street Address</label>
                                <input type="text" class="inputfull" id="streetAddress" name="streetAddress" required>

                                <label class="label" for="city">City</label>
                                <input type="text" class="inputfull" id="city" name="city" required>

                                <label class="label" for="state">State</label>
                                <input type="text" class="inputfull" id="state" name="state" required>

                                <label class="label" for="email">Email</label>
                                <input type="email" class="inputfull" id="email" name="email" required>

                                <label class="label" for="phone">Phone</label>
                                <input type="tel" class="inputfull" id="phone" name="phone" required>

                                <label class="label" for="dob">Date of Birth</label>
                                <input type="date" class="inputfull" id="dob" name="dob" required>

                                <label class="label" for="mcNumber">MC#</label>
                                <input type="text" class="inputfull" id="mcNumber" name="mcNumber" required>

                                <label class="label" for="usdot">USDOT</label>
                                <input type="text" class="inputfull" id="usdot" name="usdot" required>

                                <label class="label" for="numTrucks">Number of Trucks</label>
                                <input type="number" class="inputfull" id="numTrucks" name="numTrucks" required>

                                <label class="label" for="numDrivers">Number of Drivers</label>
                                <input type="number" class="inputfull" id="numDrivers" name="numDrivers" required>


                                <label><strong>Type Of Equipment?</strong></label> <br>

                                <input type="radio" id="boxTruck" name="equipmentType" value="Box Truck">
                                <label for="boxTruck">Box Truck</label><br>

                                <input type="radio" id="dryVan" name="equipmentType" value="Dry Van">
                                <label for="dryVan">Dry Van</label><br>

                                <input type="radio" id="hotShots" name="equipmentType" value="HotShots">
                                <label for="hotShots">HotShots</label><br>

                                <input type="radio" id="reefer" name="equipmentType" value="Reefer">
                                <label for="reefer">Reefer</label><br>

                                <input type="radio" id="powerOnly" name="equipmentType" value="Power Only">
                                <label for="powerOnly">Power Only</label><br>

                                <input type="radio" id="flatbed" name="equipmentType" value="Flatbed">
                                <label for="flatbed">Flatbed</label><br>

                                <input type="radio" id="conestoga" name="equipmentType" value="Conestoga">
                                <label for="conestoga">Conestoga</label><br>


                                <label><strong>Payment Method for Your Invoices:</strong></label> <br>

                                <input type="radio" id="factoring" name="PaymentMethod" value="Factoring">
                                <label for="factoring">Factoring</label><br>

                                <input type="radio" id="quickPay" name="PaymentMethod" value="Quick Pay">
                                <label for="quickPay"> Quick Pay</label><br>

                                <input type="radio" id="both" name="PaymentMethod" value="Both">
                                <label for="both">Both</label><br>


                                <label><strong>Route:</strong></label> <br>

                                <input type="radio" id="otr" name="Route" value="OTR">
                                <label for="otr">OTR</label><br>

                                <input type="radio" id="local" name="Route" value="Local">
                                <label for="local">Local</label><br>

                                <label><strong>What States Do You Prefer to Drive (Only for OTR)
                                        (Optional):</strong></label> <br>
                                <div class="container">
                                    <textarea class="form-control" id="my text" rows="5"></textarea>


                                    <label><strong>Upload Your Documents :</strong></label> <br>
                                    <ul type="none" class="ullist">
                                        <li><label for="file">MC Authority Letter</label><br>
                                            <input type="file" id="file" name="file">
                                        </li>

                                        <li><label for="file">Certificate of Liability Insurance</label><br>
                                            <input type="file" id="file" name="file">
                                        </li>
                                    </ul>
                                    <ul type="none" class="ullist">
                                        <li><label for="file">W9 Form</label><br>
                                            <input type="file" id="file" name="file">
                                        </li>

                                        <li><label for="file">Void Cheque (For QuickPay)</label><br>
                                            <input type="file" id="file" name="file">
                                        </li>
                                    </ul>


                                </div>
                                <input type="submit" value="Submit" class="inputfull">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->

        </div>
        <!-- Content wrapper end -->


    </div>
    <!-- Content wrapper scroll end -->
@endsection

@push('script-page-level')
@endpush
