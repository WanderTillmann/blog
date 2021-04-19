@extends('layout.app')

@section('title')
Página de Contato
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Want to get in touch? fill out the form below to sen me a message and i will get to back to you as soon as
        possible!</p>

      <form action="">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="">Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name" required
              data-validation-required-message="Please enter your name.">
            <p class="help-bloc text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="">Email Address</label>
            <input type="emal" class="form-control" placeholder="Email Address" id="email" required
              data-validation-required-message="Please enter your email.">
            <p class="help-bloc text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group  col-sx-12 floating-label-form-group controls">
            <label for="">Phone Number</label>
            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required
              data-validation-required-message="Please enter your tel phone.">
            <p class="help-bloc text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea rows="5" class="form-control" placeholder="Message" id="message" required
              data-validation-required-message="Please enter your message."></textarea>
              <p class="help-bloc text-danger"></p>
          </div>
        </div>
        <br>
        <div class="success"></div>
        <div class="form-group">
          <button class="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
@include('main.paginate')
@endsection

@prepend('scripts')
  <script src="js/jqBootstrapValidation.min.js"></script>
@endprepend

@push('scripts')
  <script src="js/contact_me.min.js"></script>
@endpush