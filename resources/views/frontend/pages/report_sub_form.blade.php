@extends('frontend.master')

@section('title')
{{ 'Report Submit' }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Submit a Fraud Report</h1>
            <p class="subtitle">Help keep others safe by reporting your fraud experience.</p>

            @if (session('success'))
              <div class="alert alert-success">
                <p>{{session('success') }}</p>
              </div>
            @endif

            <form id="fraudReportForm" action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-grid">
                    <!-- Left Column -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="fraudsterName">Fraudster's  name or business name <span class="text-danger">*</span> </label>
                            <input type="text" id="fraudsterName" name="fraudster_name"
                                placeholder="Enter the profile or business name" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" placeholder="Enter city, area, or address">
                        </div>

                        <div class="form-group">
                            <label for="fraudType">Type of fraud</label>
                            <select id="fraudType" name="fraud_type">
                                <option value="">Select the type</option>
                                <option value="financial">Financial Fraud</option>
                                <option value="ecommerce">E-commerce Fraud</option>
                                <option value="identity">Identity Theft</option>
                                <option value="investment">Investment Scam</option>
                                <option value="phishing">Phishing</option>
                                <option value="charity">Charity Scam</option>
                                <option value="romance">Romance Scam</option>
                                <option value="employment">Employment Scam</option>
                                <option value="lottery">Lottery Scam</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bankDetails">Fraudster's bank details (optional)</label>
                            <input type="text" id="bankDetails" name="bank_details"
                                placeholder="Ex., bKash/Nagad number or bank details">
                        </div>

                        <div class="form-group">
                            <label for="paymentPlatform">Payment platform used (optional)</label>
                            <input type="text" id="paymentPlatform" name="payment_platform"
                                placeholder="Ex., bKash, Nagad, bank name, etc.">
                        </div>

                        <div class="form-group">
                            <label for="fraudAmount">Fraud amount (in Taka) (optional)</label>
                            <input type="number" id="fraudAmount" name="fraud_amount"
                                placeholder="Enter the fraud amount (in Taka)">
                        </div>

                        <div class="form-group">
                            <label for="fraudDateTime">Date and time of fraud<span class="text-danger">*</span> </label>
                            <input type="date" class="form-control" name="fraud_date_time" required>
                            <small>Click the icon to open the calendar</small>
                        </div>

                        <div class="form-group">
                            <label for="evidence">Upload supporting evidence(You can upload multiple file)</label>
                            <div class="file-upload-area">
                                <input type="file" id="evidence" name="files[]" multiple>
                                {{-- <p class="drag-text">Drag files here or click to select files.</p> --}}
                            </div>
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="description">Summary of the incident <span class="text-danger">*</span> </label>
                            <textarea id="description" name="description" rows="5" placeholder="Describe the fraud in detail" required></textarea>
                        </div>

                        <div class="contact-section">
                            <h2>Your contact information</h2>
                            <div class="privacy-consent">
                                <input type="checkbox" id="privacyConsent" name="privacy_consent_name">
                                <label for="privacyConsent" class="checkbox-label">I want to reveal my Name</label>
                            </div>

                            <div class="form-group">
                                <label for="reporterName">Reporter's Name <span class="text-danger">*</span> </label>
                                <input type="text" id="reporterName" name="reporter_name"
                                    placeholder="Enter your full name" required>
                            </div>

                            <div class="privacy-consent">
                                <input type="checkbox" id="emailConsent" name="privacy_consent_email">
                                <label for="emailConsent" class="checkbox-label">I want to reveal my Email</label>
                            </div>

                            <div class="form-group">
                                <label for="contactInfo">Email, phone or profile link</label>
                                <input type="text" id="contactInfo" name="contact_info">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="scammerURL">Scammer's profile URL (optional)</label>
                            <input type="url" id="scammerURL" name="scammer_url"
                                placeholder="Enter the scammer's profile URL">
                        </div>

                    </div>
                </div>

                <button type="submit" class="submit-btn">Submit Report</button>
            </form>
        </div>
    </div>
@endsection
