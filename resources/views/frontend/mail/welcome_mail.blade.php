<div class="card">
    <div class="card-body">
        <table class="table-borderless">
            <tr>
                <td>Dear <strong>{{ $username }}</strong></td>
            </tr>
            <tr>
                <td>Email Address: <strong>{{ $email }}</strong></td>
            </tr>
            <tr>
                <td>Phone Number: <strong>{{ $phone_no }}</strong></td>
            </tr>
            <tr>
                <td>Thanks for joining our community</td>
            </tr>
            <tr>
                <td>Stay connected!</td>
            </tr>
            <tr>
                <td>Visit this link to shop more:<a href="{{ url('/') }}"> Click for more</a></td>
            </tr>
            <tr>
                <td>Regards,</td>
            </tr>
            <tr>
                <td>Foodtrucklah team.</td>
            </tr>
        </table>
    </div>
</div>
