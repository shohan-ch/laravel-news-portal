<div id="message">
    @if(session('success'))
    <div style="display: flex; justify-content: flex-end; left: 87%; padding: 0px;">
        <p class="bg-success p-2" id="message"><i class="fas fa-check"></i> {{ session('success')}}</p>
    </div>
    @elseif(session('error'))
    <p class="bg-danger p-2 font-weight-bold">{{ session('error')  }}</p>
    @endif

    @if ($errors->any())
    <div>
        <div class="font-weight-bold text-danger">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item border-0 px-0 pb-1">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>