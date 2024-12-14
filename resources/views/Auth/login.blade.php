@extends('../layout/layout')
@section('body')
    <div class="d-flex justify-content-center  h-100 ">
        <form action="{{route('logup')}}" method="post" class=" d-flex flex-column w-25 h-100 bg-black rounded-4 mt-5 px-5 py-5">
            @csrf
            <div class="form-outline mb-4 ">
                <input type="email" id="email" name="email" class="form-control"  />
                <label class="form-label" for="email">Email address</label>
                @error('email')
                    <div class=" text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control"  />
                <label class="form-label" for="password">Password</label>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="remember"> Remember me </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign
                in</button>
            <div class="text-center">
                <p>Not a member? <a href="{{route("signin")}}">Register</a></p>
            </div>
        </form>
    </div>
@endsection
