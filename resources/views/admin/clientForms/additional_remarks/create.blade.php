@extends('admin.layouts.app')
@push('styles')
    <style>

        /* Ensure editable content is visible by default */
        #editableContent {
            display: block;
        }
    </style>
@endpush
@section('content')

    <form action="{{ route('store-additionalRemarks') }}" method="POST">
        @csrf
        <div class="container">
            <!-- Editable Form (Visible by Default) -->
            <div style="max-width: 800px; width: 100%; height: 80%;">
                <div id="editableContent">
                    <div id="editableForm" style="border: 1px solid #000; padding: 10px; box-sizing: border-box; width: 100%; height: 100%;">
                        <div style="text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 10px; text-transform: uppercase;">
                            ADDITIONAL REMARKS SCHEDULE
                        </div>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <div style="flex: 1; margin-right: 10px;">
                                <label style="font-size: 12px; font-weight: bold;">AGENCY CUSTOMER ID:</label><br>
                                <input type="text" id="customerId" name="agency_customer_id" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px;">
                            </div>
                            <div style="flex: 1;">
                                <label style="font-size: 12px; font-weight: bold;">LOC #:</label><br>
                                <input type="text" id="locNum" name="loc" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px;">
                            </div>
                        </div>




                        <table style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
                            <tr>
                                <td style="width: 50%; padding: 5px; font-size: 12px; vertical-align: top;">
                                    <strong style="font-size: 12px;">AGENCY</strong><br>
                                    <input type="text" id="agency" name="agency_name" value="Aim Insurance Of Texas" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                </td>
                                <td style="width: 50%; padding: 5px; font-size: 12px; vertical-align: top;">
                                    <strong style="font-size: 12px;">NAMED INSURED</strong><br>
                                    <input type="text" id="namedInsured" name="name_insured" value="JJH CONSTRUCTION LLC" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%; padding: 5px; font-size: 12px; vertical-align: top;">
                                    <strong style="font-size: 12px;">POLICY NUMBER</strong><br>
                                    <input type="text" id="policyNumber" name="policy_number" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                </td>
                                <td style="width: 50%; padding: 5px; font-size: 12px; vertical-align: top;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 70%; border: none; padding-right: 5px;">
                                                <strong style="font-size: 12px;">CARRIER</strong><br>
                                                <input type="text" id="carrier" name="carrier" value="" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                            </td>
                                            <td style="width: 30%; border: none;">
                                                <strong style="font-size: 12px;">NAIC CODE</strong><br>
                                                <input type="text" id="naicCode" name="naic_code" style="width: 100%; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 5px; font-size: 12px; vertical-align: top;">
                                    <strong style="font-size: 12px;">EFFECTIVE DATE:</strong>
                                    <input type="date" id="effectiveDate" name="effective_date" value="" style="width: 120px; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                </td>
                            </tr>
                        </table>

                        <div style="margin-bottom: 5px; font-size: 12px; font-weight: bold;">
                            <strong>ADDITIONAL REMARKS</strong>
                        </div>

                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="padding: 5px; font-size: 12px;">
                                    THIS ADDITIONAL REMARKS FORM IS A SCHEDULE TO ACORD FORM,
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px; font-size: 12px;">
                                    FORM NUMBER:
                                    <input type="text" id="formNumber" name="form_no" style="width: 80px; display: inline-block; margin-right: 5px; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                    FORM TITLE:
                                    <input type="text" id="formTitle" name="form_title" style="width: 300px; display: inline-block; border: none; border-bottom: 1px solid #000; padding: 2px; font-size: 12px; box-sizing: border-box;">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;">
                                    <textarea id="additionalRemarks" name="description" placeholder="Enter Additional Remarks Here..." style="width: 100%; height: 300px; border: 1px solid #000; padding: 5px; resize: none; font-size: 12px; box-sizing: border-box;"></textarea>
                                </td>
                            </tr>
                        </table>


                    </div>


                </div>
            </div>
        </div>
        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary   m-1">Submit</button>
                <button type="reset" class="btn btn-secondary   m-1">Reset</button>
            </div>
        </div>
    </form>



@endsection
@push('script')


@endpush
