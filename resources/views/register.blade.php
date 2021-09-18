<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3 class="text-center">Register</h3>

                        <form class="requires-validation" novalidate action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" id="name" placeholder="Full Name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                                 @error('username')
                                     <div class="invalid-feedback">{{$errors->first('username')}}</div>
                                 @enderror
                             </div>
                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail Address" required>
                                @error('email')
                                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                                @enderror
                            </div>

                           <div class="col-md-12">
                                {{--  <select class="form-select mt-3" required>
                                      <option selected disabled value="">Position</option>
                                      <option value="jweb">Junior Web Developer</option>
                                      <option value="sweb">Senior Web Developer</option>
                                      <option value="pmanager">Project Manager</option>
                               </select>  --}}
                               <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                                @enderror
                            </div>


                           <div class="col-md-12">
                              <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{$errors->first('confirm_password')}}</div>
                                @enderror
                           </div>


                           <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" id="male" checked autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>

                            </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" name="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                            @error('invalidCheck')
                                <div class="invalid-feedback">{{$errors->first('invalidCheck')}}</div>
                            @enderror
                        </div>


                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('js/register.js')}}"></script>
</body>
</html>
