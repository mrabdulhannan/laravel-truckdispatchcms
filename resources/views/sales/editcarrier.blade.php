@extends('layouts.app')

@push('stylesheet-page-level')
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
                            <form action="{{ route('updateCarrier', ['id' => $carrier->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Company Name Input -->
                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName"
                                        value="{{ $carrier->companyName }}" required>
                                </div>

                                <!-- DBA Input -->
                                <div class="mb-3">
                                    <label for="dba" class="form-label">DBA (if any)</label>
                                    <input type="text" class="form-control" id="dba" name="dba"
                                        value="{{ $carrier->dba }}">
                                </div>

                                <!-- Address Input -->
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $carrier->address }}" required>
                                </div>

                                <!-- Street Address Input -->
                                <div class="mb-3">
                                    <label for="streetAddress" class="form-label">Street Address</label>
                                    <input type="text" class="form-control" id="streetAddress" name="streetAddress"
                                        value="{{ $carrier->streetAddress }}" required>
                                </div>

                                <!-- City Input -->
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        value="{{ $carrier->city }}" required>
                                </div>

                                <!-- State Input -->
                                <div class="mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" name="state"
                                        value="{{ $carrier->state }}" required>
                                </div>

                                <!-- Email Input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $carrier->email }}" required>
                                </div>

                                <!-- Phone Input -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        value="{{ $carrier->phone }}" required>
                                </div>

                                <!-- Date of Birth Input -->
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="{{ $carrier->dob }}" required>
                                </div>

                                <!-- MC# Input -->
                                <div class="mb-3">
                                    <label for="mcNumber" class="form-label">MC#</label>
                                    <input type="text" class="form-control" id="mcNumber" name="mcNumber"
                                        value="{{ $carrier->mcNumber }}" required>
                                </div>

                                <!-- USDOT Input -->
                                <div class="mb-3">
                                    <label for="usdot" class="form-label">USDOT</label>
                                    <input type="text" class="form-control" id="usdot" name="usdot"
                                        value="{{ $carrier->usdot }}" required>
                                </div>

                                <!-- Number of Trucks Input -->
                                <div class="mb-3">
                                    <label for="numTrucks" class="form-label">Number of Trucks</label>
                                    <input type="number" class="form-control" id="numTrucks" name="numTrucks"
                                        value="{{ $carrier->numTrucks }}" required>
                                </div>

                                <!-- Number of Drivers Input -->
                                <div class="mb-3">
                                    <label for="numDrivers" class="form-label">Number of Drivers</label>
                                    <input type="number" class="form-control" id="numDrivers" name="numDrivers"
                                        value="{{ $carrier->numDrivers }}" required>
                                </div>

                                <!-- Equipment Type Radio Buttons -->
                                <div class="mb-3">
                                    <label><strong>Type Of Equipment?</strong></label> <br>
                                    @foreach(['Box Truck', 'Dry Van', 'HotShots', 'Reefer', 'Power Only', 'Flatbed', 'Conestoga'] as $type)
                                        <input type="radio" id="{{ $type }}" name="equipmentType" value="{{ $type }}"
                                            {{ $carrier->equipmentType === $type ? 'checked' : '' }}>
                                        <label for="{{ $type }}">{{ $type }}</label><br>
                                    @endforeach
                                </div>

                                <!-- Payment Method Radio Buttons -->
                                <div class="mb-3">
                                    <label><strong>Payment Method for Your Invoices:</strong></label> <br>
                                    @foreach(['Factoring', 'Quick Pay', 'Both'] as $method)
                                        <input type="radio" id="{{ $method }}" name="PaymentMethod" value="{{ $method }}"
                                            {{ $carrier->PaymentMethod === $method ? 'checked' : '' }}>
                                        <label for="{{ $method }}">{{ $method }}</label><br>
                                    @endforeach
                                </div>

                                <!-- Route Radio Buttons -->
                                <div class="mb-3">
                                    <label><strong>Route:</strong></label> <br>
                                    <input type="radio" id="otr" name="Route" value="OTR"
                                        {{ $carrier->Route === 'OTR' ? 'checked' : '' }}>
                                    <label for="otr">OTR</label><br>
                                    <input type="radio" id="local" name="Route" value="Local"
                                        {{ $carrier->Route === 'Local' ? 'checked' : '' }}>
                                    <label for="local">Local</label><br>
                                </div>

                                <!-- Preferred States Textarea -->
                                <div class="mb-3">
                                    <label><strong>What States Do You Prefer to Drive (Only for OTR)
                                            (Optional):</strong></label> <br>
                                    <textarea class="form-control" id="preferredStates" name="preferredStates"
                                        rows="5">{{ $carrier->preferredStates }}</textarea>
                                </div>

                            <label class="label" for="mcAuthorityLetter">MC Authority Letter</label>
                            <input type="text" class="inputfull" id="mcAuthorityLetter" name="mcAuthorityLetter" value="{{ $carrier->mc_authority_letter }}"
                                required>

                            <label class="label" for="certificateOfLiabilityInsurance">Certificate of Liability
                                Insurance</label>
                            <input type="text" class="inputfull" id="certificateOfLiabilityInsurance"
                                name="certificateOfLiabilityInsurance" value="{{ $carrier->certificate_of_liability_insurance }}"required>

                            <label class="label" for="w9Form">W9 Form</label>
                            <input type="text" class="inputfull" id="w9Form" name="w9Form" value="{{ $carrier->w9_form }}"required>

                            <label class="label" for="voidCheque">Void Cheque (For QuickPay)</label>
                            <input type="text" class="inputfull" id="voidCheque" name="voidCheque" value="{{ $carrier->void_cheque }}" required>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update</button>
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
