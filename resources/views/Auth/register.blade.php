@extends('../layout/layout')
@section('body')
    <section class="vh-100 ">
        <div class="row d-flex justify-content-center align-items-center p-4">
            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 bg-black rounded-5">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form action="{{route('signup')}}" method="POST" class="mx-1 mx-md-4">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" name="name" id="name" class="form-control" />
                            <label class="form-label" for="name">Your Name</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="email" class="form-control" />
                            <label class="form-label" for="email">Your Email</label>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <input type="password"name="password"  id="password" class="form-control" />
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                            <label class="form-label" for="confirm_password">Repeat your password</label>
                            @error('confirm_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-column justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        <div class="text-center">
                            <p>Alrady a member? <a href="{{route("login")}}">sign-in</a></p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
