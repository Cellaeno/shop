@if (count($errors) > 0)
  <div style="background-color: #FFF2EF;font-size: 16px;color: #AAA;margin-top: 30px;text-align: left;padding-left: 20px;">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif