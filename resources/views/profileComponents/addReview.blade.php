@extends('../Profile')
@section('content2')
    <form id="form5" style="height:30vh">

        <div class="container ">
            <div class=" pb-2">
                <span class="text-center">Your Review:</span>
                <textarea style="max-height: 120px;" id="textArea" name="text"  class="form-control"> </textarea>
            </div>
            <div class="d-flex  flex-column align-items-center ">
                <input style="background-color: #ff7241" class="btn text-light " id="btn" type="submit"
                    placeholder="Submit Your Review ">
            </div>
        </div>
    </form>







    <script async>
        const form5 = document.getElementById('form5');

        
        form5.addEventListener('submit', function(e) {
            e.preventDefault();
            formData = {
                textarea: e.target.text.value
            }
            console.log(formData.textarea);
            return false
        });
    </script>
@endsection
