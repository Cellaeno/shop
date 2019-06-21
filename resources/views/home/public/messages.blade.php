@if (session('error'))
    <div class="alert alert-danger" style="font-size: 16px;background-color: #c51;text-align: left;padding-left: 20px;">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" style="font-size: 16px;background-color: #595;text-align: left;padding-left: 20px;">
        {{ session('success') }}
    </div>
@endif