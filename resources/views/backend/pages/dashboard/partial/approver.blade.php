@php
    use App\Support\RoleSupport;
    use App\Support\StatusSupport;
@endphp
<div class="row">
    <div class="col-12 dash-card">
        <div class="dash-title dash-warning">WAITING FOR APPROVAL TOTAL</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_pending">{{ $total_employees_awaiting_review }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 dash-card">
        <div class="dash-title dash-success">APPROVED TOTAL</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_approved">{{ $total_employees_reviewed_by_status[StatusSupport::STATUS_APPROVED] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-12 dash-card">
        <div class="dash-title dash-info">ON HOLD TOTAL</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_on_hold">{{ $total_employees_reviewed_by_status[StatusSupport::STATUS_ONHOLD] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 dash-card">
        <div class="dash-title">REJECTED TOTAL</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_rejected">{{ $total_employees_reviewed_by_status[StatusSupport::STATUS_REJECTED] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-12 dash-card">
        <div class="dash-title dash-dark">ALL REVIEWED</div>
        <div class="dash-value">
            <table>
                <tbody>
                <tr>
                    <td id="encoded_total">{{ $total_employees_reviewed }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
