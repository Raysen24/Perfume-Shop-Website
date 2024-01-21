<div onclick=closeProfile() class="profile">

        <div class="close-profile"><i onclick=closeProfile() class='bx bx-x'></i></div>

        <div class="profile-data">
            <div class="pp">
                <img src="" alt="">
            </div>
            <div class="name">{{ $customer->customerName }}</div>
            <div class="self-data">
                <!-- Display other customer information -->
                <div class="field">Name</div>
                <div class="data">{{ $customer->customerName }}</div>
                <div class="field">DOB</div>
                <div class="data">{{ $customer->date_of_birth }}</div>
                <div class="field">Email</div>
                <div class="data">{{ $customer->email }}</div>
                <div class="field">Phone</div>
                <div class="data">{{ $customer->phone }}</div>
                <div class="field">Address</div>
                <div class="data">{{ $customer->address }}</div>
                <!-- Add more fields as needed -->
                <div class="show-points">
                    <div class="data" id="point-title">Dès Vu Points</div>
                    <div class="points">
                        <div class="num">
                            {{ $customer->memberPoints }}
                        </div>
                    </div>
                </div>

                <a href="{{url('history')}}">
                    <button class="tohistorybtn">Transaction History >></button>
                </a>
            </div>
        </div>