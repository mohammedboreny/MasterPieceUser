@extends('layout.index')
@section('content')
    <style>
        .contact .info i {
            font-size: 20px;
            color: #ff7241;
            float: left;
            width: 44px;
            height: 44px;
            background: #e7f5fb;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }
    </style>
    <div class="container mt-5 mb-5 gap-3">
        <div class="row">
            <div class=" col-md-6 col-sm-12 align-items-stretch">
                <h3>Your Order Info:</h3>

                <div style=" border-top: 3px solid #ff7241;
                border-bottom: 3px solid #ff7241;
                padding: 30px;
                background: #fff;
                width: 100%;
                box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.1);"
                    class="info">
                    <div class="address">

                        <h4>Location:</h4>
                        <p> <?php echo json_encode($data['park']->street); ?> <?php echo json_encode($data['park']['city']); ?></p>
                        <h4>Park name:</h4>
                        <p> <?php echo json_encode($data['park']['name']); ?></p>
                    </div>
                    <div class="phone">
                        <h4>Number of hours:</h4>
                        <p><?php echo json_encode($data['order']['NoOfHours']); ?> </p>
                    </div>
                    <div class="email">
                        <h4>Date:</h4>
                        <p><?php echo json_encode($data['order']['date']); ?> at <?php echo json_encode($data['order']['dateTime']); ?> </p>
                    </div>
                    <div class="phone">
                        <h4>Your Contact number:</h4>
                        <p><?php echo json_encode($data['order']['phone']); ?> </p>
                    </div>
                    <div class="phone">
                        <h4>Total Payment Amount in JD:</h4>
                        <p><?php echo json_encode($data['order']['NoOfHours']*2); ?> JD </p>
                    </div>
                </div>
            </div>
            <form 
            action="{{route('order.Confirmation',$data['order'],$data['park']['id'])}}"
                 class=" col-md-4 col-sm-12" method="post" id="submitBtn">
                @csrf
                <div class="form-floating mb-3 ">
                    <h3>Provide Your Credit Card information here</h3>
                    <div style="flex-direction: row-reverse;" class="d-flex align-items-center flex-wrap justify-content-between w-100 border rounded">

                        <div class="form-floating w-100 m-1 mb-3">
                            <input class="form-control" name="email" id="email" type="email" placeholder="email"
                                data-sb-validations="required">
                            <label for="message">Email</label>
                        </div>
                        <div class="form-floating w-100 m-1">
                            <input type="text" name="cardNo" id="cardNo" class="form-control "
                                placeholder="Card number">
                            <label for="">Card Number</label>
                        </div>
                        <div class="d-flex wrap w-100">


                            <input type="date" name="expirationDate" class="form-control m-1 mt-2" placeholder="MM/YY">

                            <input type="password" name="securityCode" maxlength=3 class="form-control m-1 mt-2"
                                placeholder="CVV">
                        </div>
                        <br>
                        <div class="my-3 form-floating w-100 d-flex">

                            <input type="text" placeholder="Card " name="Cardholder" class="form-control m-1"
                                id="">
                            <label class=" mb-2">Cardholder name</label>

                        </div>
                        <br>
                        <div class="my-1 form-floating w-100 d-flex">
                            <input class="form-control m-1" id="billingAddress" placeholder="dfsdas" name="billingAddress"
                                type="text">
                            <label for="" class=" mb-2">Billing address</label>
                        </div>

                        <button style="background-color: #ff7241;  " type="submit"
                            class="btn  text-light">Confirm Order</button>
                        
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
    <script async>
        let submitBtn = document.getElementById('submitBtn');
        submitBtn.addEventListener('submit', listenerSubmit)

        function listenerSubmit(e) {
            e.preventDefault();
            let regix = "^4[0-9]{12}(?:[0-9]{3})?$";
            let Cardnumber = e.target.cardNo.value;
            let email = e.target.email.value;
            let cardDate=e.target.expirationDate.value;
            let Cvv=e.target.securityCode.value;
            let Cardholder=e.target.Cardholder.value;
            let billingAddress=e.target.billingAddress.value;
            const foundCard = Cardnumber.match(regix);
            if (!foundCard) {
                console.log('Not recognized card number');
                Swal.fire(
                    'Card Number is invalid!',
                    'Please Check The Card Number Again!',
                    'error'
                )
                return false;
            }

            // let formData={
            //     Cardnumber: Cardnumber,
            //     email:email,
            //     cardDate:cardDate,
            //     Cvv:Cvv,
            //     Cardholder:Cardholder,
            //     billingAddress:billingAddress
            // };


            submitBtn.submit();

        }
    </script>
@endsection
