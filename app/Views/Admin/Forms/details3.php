<?= view('Admin/chop/head'); ?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form class="container mt-5" method="post" action="/form3sv">
                        <fieldset>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="5">
                                                <h5 style="text-align: center;">ENROLLMENT FORM FOR
                                                    MEMBERSHIP IN THE GROUP LIFE INSURANCE PLAN</h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" style="text-align: center;">A. Personal
                                                Information of Applicant</th>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Date of Birth (MM/DD/YY)</th>
                                            <th>Occupation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" id="lastName" name="lastName" class="form-control"
                                                    readonly
                                                    value="<?= isset($gli['lastName']) ? $gli['lastName'] : '' ?>"></td>
                                            <td><input type="text" id="firstName" name="firstName" class="form-control"
                                                    readonly
                                                    value="<?= isset($gli['firstName']) ? $gli['firstName'] : '' ?>">
                                            </td>
                                            <td><input type="text" id="middleName" name="middleName"
                                                    class="form-control" readonly
                                                    value="<?= isset($gli['middleName']) ? $gli['middleName'] : '' ?>">
                                            </td>
                                            <td><input type="date" id="dateOfBirth" name="dateOfBirth"
                                                    class="form-control" readonly
                                                    value="<?= isset($gli['dateOfBirth']) ? $gli['dateOfBirth'] : '' ?>">
                                            </td>
                                            <td><input type="text" id="occupation" name="occupation"
                                                    class="form-control" readonly
                                                    value="<?= isset($gli['occupation']) ? $gli['occupation'] : '' ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name Of Company</th>
                                            <th>Nature of Business</th>
                                            <th>Sex</th>
                                            <th>Civil Status</th>
                                            <th>Nationality</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" id="companyName" name="companyName"
                                                    class="form-control" readonly
                                                    value="<?= isset($gli['companyName']) ? $gli['companyName'] : '' ?>">
                                            </td>
                                            <td><input type="text" id="businessNature" name="businessNature"
                                                    class="form-control" readonly
                                                    value="<?= isset($gli['businessNature']) ? $gli['businessNature'] : '' ?>">
                                            </td>
                                            <td>
                                                <input type="text" id="sex" name="sex" class="form-control"
                                                    value="<?= isset($gli['sex']) ? $gli['sex'] : '' ?>" readonly>

                                            <td>

                                                <input type="text" id="civilStatus" name="civilStatus"
                                                    class="form-control"
                                                    value="<?= isset($gli['civilStatus']) ? $gli['civilStatus'] : '' ?>"
                                                    readonly>
                                            </td>
                                            <td><input type="text" id="nationality" name="nationality"
                                                    class="form-control" readonly
                                                    value="<?= isset($gli['nationality']) ? $gli['nationality'] : '' ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th rowspan="5" style="text-align: center;">ADDRESS</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Residence (NO., Street, Subdivision/Village,
                                                District, Municipality/City)</th>
                                            <th colspan="2">Telephone Number</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="text" id="residenceAddress"
                                                    name="residenceAddress" class="form-control" readonly
                                                    value="<?= isset($gli['residenceAddress']) ? $gli['residenceAddress'] : '' ?>">
                                            </td>
                                            <td colspan="2"><input type="text" id="residenceTelephone"
                                                    name="residenceTelephone" class="form-control" readonly
                                                    value="<?= isset($gli['residenceTelephone']) ? $gli['residenceTelephone'] : '' ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Business/Office (NO., Street,
                                                Subdivision/Village, District, Municipality/City)</th>
                                            <th colspan="2">Telephone Number</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="text" id="businessAddress"
                                                    name="businessAddress" class="form-control" readonly
                                                    value="<?= isset($gli['businessAddress']) ? $gli['businessAddress'] : '' ?>">
                                            </td>
                                            <td colspan="2"><input type="text" id="businessTelephone"
                                                    name="businessTelephone" class="form-control" readonly
                                                    value="<?= isset($gli['businessTelephone']) ? $gli['businessTelephone'] : '' ?>">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th colspan="8" style="text-align: center;">B. Benificiary /
                                                ies;</th>
                                        </tr>
                                        <TR>
                                            <TH colspan="3">Name of Benificiary/ies
                                            <TH colspan="3">DateTime
                                            <TH rowspan="2">Relationship
                                            <TH rowspan="2">Remarks
                                        <TR>
                                            <TH>(First)
                                            <TH>M.I.
                                            <TH>(Last)
                                            <TH>MM
                                            <TH>DD
                                            <TH>YY
                                        <tr>
                                            <td><input type="text" class="form-control" readonly id="firstName1"
                                                    name="firstName1"
                                                    value="<?= isset($gli['firstName1']) ? $gli['firstName1'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="mi1" name="mi1"
                                                    value="<?= isset($gli['mi1']) ? $gli['mi1'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="lastName1"
                                                    name="lastName1"
                                                    value="<?= isset($gli['lastName1']) ? $gli['lastName1'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="month1"
                                                    name="month1"
                                                    value="<?= isset($gli['month1']) ? $gli['month1'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="day1" name="day1"
                                                    value="<?= isset($gli['day1']) ? $gli['day1'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="year1" name="year1"
                                                    value="<?= isset($gli['year1']) ? $gli['year1'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="relationship1"
                                                    name="relationship1"
                                                    value="<?= isset($gli['relationship1']) ? $gli['relationship1'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="remarks1"
                                                    name="remarks1"
                                                    value="<?= isset($gli['remarks1']) ? $gli['remarks1'] : '' ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" readonly id="firstName2"
                                                    name="firstName2"
                                                    value="<?= isset($gli['firstName2']) ? $gli['firstName2'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="mi2" name="mi2"
                                                    value="<?= isset($gli['mi2']) ? $gli['mi2'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="lastName2"
                                                    name="lastName2"
                                                    value="<?= isset($gli['lastName2']) ? $gli['lastName2'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="month2"
                                                    name="month2"
                                                    value="<?= isset($gli['month2']) ? $gli['month2'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="day2" name="day2"
                                                    value="<?= isset($gli['day2']) ? $gli['day2'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="year2" name="year2"
                                                    value="<?= isset($gli['year2']) ? $gli['year2'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="relationship2"
                                                    name="relationship2"
                                                    value="<?= isset($gli['relationship2']) ? $gli['relationship2'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="remarks2"
                                                    name="remarks2"
                                                    value="<?= isset($gli['remarks2']) ? $gli['remarks2'] : '' ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" readonly id="firstName3"
                                                    name="firstName3"
                                                    value="<?= isset($gli['firstName3']) ? $gli['firstName3'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="mi3" name="mi3"
                                                    value="<?= isset($gli['mi3']) ? $gli['mi3'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="lastName3"
                                                    name="lastName3"
                                                    value="<?= isset($gli['lastName3']) ? $gli['lastName3'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="month3"
                                                    name="month3"
                                                    value="<?= isset($gli['month3']) ? $gli['month3'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="day3" name="day3"
                                                    value="<?= isset($gli['day3']) ? $gli['day3'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="year3" name="year3"
                                                    value="<?= isset($gli['year3']) ? $gli['year3'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="relationship3"
                                                    name="relationship3"
                                                    value="<?= isset($gli['relationship3']) ? $gli['relationship3'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="remarks3"
                                                    name="remarks3"
                                                    value="<?= isset($gli['remarks3']) ? $gli['remarks3'] : '' ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" readonly id="firstName4"
                                                    name="firstName4"
                                                    value="<?= isset($gli['firstName4']) ? $gli['firstName4'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="mi4" name="mi4"
                                                    value="<?= isset($gli['mi4']) ? $gli['mi4'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="lastName4"
                                                    name="lastName4"
                                                    value="<?= isset($gli['lastName4']) ? $gli['lastName4'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="month4"
                                                    name="month4"
                                                    value="<?= isset($gli['month4']) ? $gli['month4'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="day4" name="day4"
                                                    value="<?= isset($gli['day4']) ? $gli['day4'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="year4" name="year4"
                                                    value="<?= isset($gli['year4']) ? $gli['year4'] : '' ?>"></td>
                                            <td><input type="text" class="form-control" readonly id="relationship4"
                                                    name="relationship4"
                                                    value="<?= isset($gli['relationship4']) ? $gli['relationship4'] : '' ?>">
                                            </td>
                                            <td><input type="text" class="form-control" readonly id="remarks4"
                                                    name="remarks4"
                                                    value="<?= isset($gli['remarks4']) ? $gli['remarks4'] : '' ?>"></td>
                                        </tr>
                                        <tr>
                                            <th colspan="1">Trustee of minor benificiary/ies;</th>
                                            <th colspan="7"><input type="text" id="trusteeMinorBeneficiary"
                                                    name="trusteeMinorBeneficiary" class="form-control" readonly
                                                    value="<?= isset($gli['trusteeMinorBeneficiary']) ? $gli['trusteeMinorBeneficiary'] : '' ?>">
                                            </th>
                                        </tr>
                                    </tbody>
                                </table><br>

                                <p style="text-align: justify;">I hereby apply for participation in the
                                    group life insurance plan for which I am or may become eligible for
                                    subject to the terms and conditions of the Group Policy. I further
                                    agree that my insurance shall become effective on the date stated on
                                    the certificate to be issued to me by Allianz PNB Life Insurance,
                                    Inc. provided that I am actively at work on such date and the
                                    premium corresponding to my insurance has been paid. I authorize
                                    Allianz PNB Life Insurance, Inc. to process the information I have
                                    provided in accordance with the Data Privacy Act.</p><br>
                                <p>Signed at <input type="text" style="width: 100px; border-radius: 7px;" id="place"
                                        name="place" value="<?= isset($gli['place']) ? $gli['place'] : '' ?>" readonly>
                                    this <input type="text" style="width: 50px; border-radius: 7px;" id="day" name="day"
                                        value="<?= isset($gli['day']) ? $gli['day'] : '' ?>" readonly>
                                    day of <input type="text" style="width: 100px; border-radius: 7px;" id="month"
                                        name="month" value="<?= isset($gli['month']) ? $gli['month'] : '' ?>" readonly>,
                                    <input type="text" style="width: 50px; border-radius: 7px;" id="year" name="year"
                                        value="<?= isset($gli['year']) ? $gli['year'] : '' ?>"
                                        readonly>.<br><br><br><br>
                                </p>
                                <p style="text-align: right;">
                                    <input type="text" style="width: 45%; border-radius: 10px;" id="applicantSignature"
                                        name="applicantSignature" placeholder="Applicant"
                                        value="<?= isset($gli['applicantSignature']) ? $gli['applicantSignature'] : '' ?>"
                                        readonly>
                                <h6 style="text-align: right;">Printed Name and Signiture of Applicant
                                </h6>
                                </p>
                            </div><br><br>
                        </fieldset>
                    </form>
                    <div class="fixed-bottom text-center mb-3">

                    <a href="<?= isset($gli['applicant_id']) ? base_url('generatePdf/' . $gli['applicant_id']) : '#' ?>" class="btn btn-success"><i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>