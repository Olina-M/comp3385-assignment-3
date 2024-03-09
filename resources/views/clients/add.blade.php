@extends ('layouts.app')

@section('content')
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


<style>
    .form-group {
        margin-bottom: 15px; /* Adjust the value as needed */
    }

    .required-label::after {
        content: " *";
        color: red;
    }
    h1 {
        font-weight: bold;
    }

</style>

<form action="{{ url('/clients') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Create Client</h1>
    <div class="form-group">
        <label for="nameInput" class="required-label">Name</label>
        <input type="text" class="form-control" id="nameInput" name="name" required>
    </div>
    <div class="form-group">
        <label for="emailInput" class="required-label">Email</label>
        <input type="email" class="form-control" id="emailInput" name="email"required>
    </div>
    <div class="form-group">
        <label for="phoneInput" class="required-label">Phone</label>
        <input type="tel" class="form-control" id="phoneInput" name="phone" required>
        <small style="color: #616467">Format: xxx-xxx-xxxx</small>
    </div>
    <div class="form-group">
        <label for="addressInput" class="required-label">Address</label>
        <input type="text" class="form-control" id="addressInput" name="address" placeholder="3385 Antigua Ave, Five Islands Village, Antigua & Barbuda" required>
    </div>
    <div class="form-group">
        <label for="logoInput" class="required-label">Company Logo</label>
        <input type="file" class="form-control" id="logoInput" name="company_logo" required>
        <small style="color: #616467">Only image files (e.g. jpg, png) are allowed, and files must be less than 2MB.</small>
       
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection