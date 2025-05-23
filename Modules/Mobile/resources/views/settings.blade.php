@extends('mobile::layouts.layout')

@section('content-mobile')
  <!-- App Capsule -->
  <div id="appCapsule">

    <div class="section mt-3 text-center">
      <div class="avatar-section">
        <a href="#">
          <img src="{{ asset('img/' . Auth::user()->img) }}" alt="avatar" class="imaged rounded"
            style="width: 100px; height: 100px; object-fit: cover;">
          <span class="button">
            <ion-icon name="camera-outline"></ion-icon>
          </span>
        </a>
      </div>
    </div>

    <div class="listview-title mt-1">Theme</div>
    <ul class="listview image-listview text inset no-line">
      <li>
        <div class="item">
          <div class="in">
            <div>
              Dark Mode
            </div>
            <div class="form-check form-switch  ms-2">
              <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodeSwitch">
              <label class="form-check-label" for="darkmodeSwitch"></label>
            </div>
          </div>
        </div>
      </li>
    </ul>
    {{--
    <div class="listview-title mt-1">Notifications</div>
    <ul class="listview image-listview text inset">
      <li>
        <div class="item">
          <div class="in">
            <div>
              Payment Alert
              <div class="text-muted">
                Send notification when new payment received
              </div>
            </div>
            <div class="form-check form-switch  ms-2">
              <input class="form-check-input" type="checkbox" id="SwitchCheckDefault1">
              <label class="form-check-label" for="SwitchCheckDefault1"></label>
            </div>
          </div>
        </div>
      </li>
      <li>
        <a href="#" class="item premium-alert">
          <div class="in">
            <div>Notification Sound</div>
            <span class="text-primary">Edit</span>
          </div>
        </a>
      </li>
    </ul>

    <div class="listview-title mt-1">Profile Settings</div>
    <ul class="listview image-listview text inset">
      <li>
        <a href="#" class="item premium-alert">
          <div class="in">
            <div>Change Username</div>
          </div>
        </a>
      </li>
      <li>
        <a href="#" class="item premium-alert">
          <div class="in">
            <div>Update E-mail</div>
          </div>
        </a>
      </li>
      <li>
        <a href="#" class="item premium-alert">
          <div class="in">
            <div>Address</div>
            <span class="text-primary">Edit</span>
          </div>
        </a>
      </li>
      <li>
        <div class="item">
          <div class="in">
            <div>
              Private Profile
            </div>
            <div class="form-check form-switch ms-2">
              <input class="form-check-input" type="checkbox" id="SwitchCheckDefault2">
              <label class="form-check-label" for="SwitchCheckDefault2"></label>
            </div>
          </div>
        </div>
      </li>
    </ul> --}}

    <div class="listview-title mt-1">Security</div>
    <ul class="listview image-listview text mb-2 inset">
      {{-- <li>
        <a href="#" class="item premium-alert">
          <div class="in">
            <div>Update Password</div>
          </div>
        </a>
      </li>
      <li>
        <div class="item">
          <div class="in">
            <div>
              2 Step Verification
            </div>
            <div class="form-check form-switch ms-2">
              <input class="form-check-input" type="checkbox" id="SwitchCheckDefault3" checked />
              <label class="form-check-label" for="SwitchCheckDefault3"></label>
            </div>
          </div>
        </div>
      </li> --}}
      <li>
        <a href="{{ route('mobile.logout') }}" class="item">
          <div class="in">
            <div>Log out all devices</div>
          </div>
        </a>
      </li>
    </ul>


  </div>
  <!-- * App Capsule -->
@endsection
