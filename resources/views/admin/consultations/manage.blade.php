@extends('voyager::master')

@section('page_title', 'إدارة الاستشارات')

{{-- @section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
        
        </h1>
        
    </div>
@stop --}}


@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <?php
                            if (\Illuminate\Support\Str::startsWith($consultation->user->avatar, 'http://') || \Illuminate\Support\Str::startsWith($consultation->user->avatar, 'https://')) {
                                $user_avatar = $reply->consultant->user->avatar;
                            } else {
                                $user_avatar = Voyager::image($consultation->user->avatar);
                            }
                        ?>
                        

                        <div class="consultant-reply" >
                                    
                            <div class="consultant-reply-content" style="background:#dffcff">
                                <div class="reply-user">
                                    <img src="{{ $user_avatar }}" style="top:auto" class="avatar" alt="{{ $consultation->user->name }} avatar">
                                    <div>
                                        <h4 style="margin:0">{{ ucwords($consultation->user->name) }}</h4>
                                        <p style="margin:0">{{ $consultation->user->email }}</p>
                                    </div>
                                    
                                </div>
                                <h3>{{ $consultation->title }}</h3>
                                <pre style="color: black;background:none !important;border:0;font-size: 1.2rem !important">{!! $consultation->content !!}</pre>

                                {{-- @php
                                    $file = json_decode($consultation->attachment);
                                @endphp --}}

                                {{-- @foreach(json_decode($consultation->attachment) as $file)
                                    <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" target="_blank">
                                        {{ $file->original_name ?: '' }}
                                    </a>
                                    <br/>
                                @endforeach --}}

                                @if ($consultation->attachment)
                                            <div>
                                                <a target="_blank" href="{{ $consultation->attachment }}">{{ __('site.attachment') }}</a>
        
                                            </div>
                                @endif
                                
                                
                            </div>
                            
                        </div>

                        <hr>
                        <div>
                            
                            @foreach ($consultation->replies as $reply)
                                @if($reply->owner == 0)
                                    <?php
                                        if (\Illuminate\Support\Str::startsWith($reply->consultant->user->avatar, 'http://') || \Illuminate\Support\Str::startsWith($reply->consultant->user->avatar, 'https://')) {
                                            $user_avatar = $reply->consultant->user->avatar;
                                        } else {
                                            $user_avatar = Voyager::image($reply->consultant->user->avatar);
                                        }
                                    ?>
                                    <div class="consultant-reply" style="margin-bottom:15px">
                                        
                                        <div class="consultant-reply-content" style="@if($reply->owner == 1) background:#dffcff @elseif($reply->status == 'approved' && $reply->owner == 0)  background:white @elseif($reply->status == 'rejected'  && $reply->owner == 0)  background:#ffc4c4 @endif">
                                            <div class="reply-user">
                                                <img src="{{ $user_avatar }}" style="top:auto" class="avatar" alt="{{ $reply->consultant->user->name }} avatar">
                                                <div>
                                                    <h4 style="margin:0">{{ ucwords($reply->consultant->user->name) }}</h4>
                                                    <p style="margin:0">{{ $reply->consultant->user->email }}</p>
                                                </div>
                                                
                                            </div>
                                            <pre style="color: black;background:none !important;border:0;font-size: 1.2rem !important">{!! $reply->content !!}</pre>

                                            @if ($reply->comment)
                                                <div class="mt-3">
                                                    
                                                    <p style="color: #ff1e1e"><i class="fa-solid fa-circle-exclamation mx-2" style="font-size: 1.2rem"></i> {!! $reply->comment !!}</p>
            
                                                </div>
                                            @endif

                                            @if ($reply->meeting_url)
                                                <div class="mt-3">
                                                    {{-- <p style="color: #c"><i class="fa-solid fa-circle-info mx-2"></i>{{ __('site.The consultant request for a meeting at : ') . $reply->meeting_time}}</p> --}}
                                                    <a href="{{ $reply->meeting_url }}" target="_blank" class="btn btn-primary @if($reply->meeting_time > now()->addMinutes(30) || $reply->meeting_time < now()->subMinutes(30)) disabled @endif" style="background: #098cff;padding:5px 10px !important;"><img src="{{ asset('img/zoom.png') }}" class="mx-1" style="height: 40px" alt=""><span class="mx-1">{{ __('site.start meeting') }}</span></a>
                                                    <div style="color:black;font-size:0.9rem;color:#098cff">{{ $reply->meeting_time }}</div>
                                                </div>
                                            @endif

                                            @if ($reply->attachment)
                                                        <div>
                                                            <a target="_blank" href="{{ $reply->attachment }}">{{ __('site.attachment') }}</a>
                    
                                                        </div>
                                            @endif

                                            @if ($reply->status == 'submitted' && $reply->owner == 0)
                                                <div class="consultant-reply-actions">
                                                    <button class="btn danger reject_btn id_{{ $reply->id }}"  id="reject_btn" style="    font-size: 2rem;
                                                        width: 40px;
                                                        height: 40px;
                                                        display: flex;
                                                        justify-content: center;
                                                        align-items: center;
                                                        padding-bottom: 15px;">×</button>

                                                    <a href="{{ route('admin.consultations.reply.approve',$reply->id) }}" class="btn success"><i class="voyager-check"></i></a>
                                                </div>
                                                
                                            @endif
                                            
                                        </div>
                                        
                                    </div>
                                @else
                                <?php
                                        if (\Illuminate\Support\Str::startsWith($reply->user->avatar, 'http://') || \Illuminate\Support\Str::startsWith($reply->user->avatar, 'https://')) {
                                            $user_avatar = $reply->user->avatar;
                                        } else {
                                            $user_avatar = Voyager::image($reply->user->avatar);
                                        }
                                    ?>
                                    <div class="consultant-reply" style="margin-bottom:15px">
                                        
                                        <div class="consultant-reply-content" style="@if($reply->owner == 1) background:#dffcff @endif">
                                            <div class="reply-user">
                                                <img src="{{ $user_avatar }}" style="top:auto" class="avatar" alt="{{ $reply->user->name }} avatar">
                                                <div>
                                                    <h4 style="margin:0">{{ ucwords($reply->user->name) }}</h4>
                                                    <p style="margin:0">{{ $reply->user->email }}</p>
                                                </div>
                                                
                                            </div>
                                            <pre style="color: black;background:none !important;border:0;font-size: 1.2rem !important">{!! $reply->content !!}</pre>

                                            @if ($reply->attachment)
                                                        <div>
                                                            <a target="_blank" href="{{ $reply->attachment }}">{{ __('site.attachment') }}</a>
                    
                                                        </div>
                                            @endif
                                            @if ($reply->status == 'submitted' && $reply->owner == 0)
                                                <div class="consultant-reply-actions">
                                                    <button class="btn danger reject_btn id_{{ $reply->id }}"  id="reject_btn">×</button>

                                                    <a href="{{ route('admin.consultations.reply.approve',$reply->id) }}" class="btn success"><i class="voyager-check"></i></a>
                                                </div>
                                            @endif
                                            
                                        </div>
                                        
                                    </div>
                                @endif    
                                
                            @endforeach
                            {{-- Single reject modal --}}
                            <div class="modal modal-danger fade" tabindex="-1" id="reject_modal" role="dialog">
                                <div class="modal-dialog">
                                    <form action="{{ route('admin.consultations.reply.reject') }}" id="reject_form" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">
                                                    هل أنت متأكد أنك تريد رفض هذا الرد ؟
                                                </h4>
                                            </div>
                                            <div class="modal-body" id="reject_body">
                                                <input type="hidden" name="rejection_id" id="rejection_id">
                                                <input type="text" class="form-control" placeholder="تعليق" name="comment">
                                            </div>
                                            <div class="modal-footer">

                                                    <input type="submit" class="btn btn-danger pull-right delete-confirm"
                                                            value="نعم" style="margin: 0 5px;">
                                                
                                                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                                                    {{ __('voyager::generic.cancel') }}
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </form>
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

<style>
    .panel-body > h3{
        font-weight: 700;
    }
    .panel-body > h4{
        line-height: 2.1 !important;
    }
    .reply-user .avatar {
        width: 40px !important;
        height: auto;
        border: 0;
        border-radius: 50%;
        margin-left: 10px;
    }
    .reply-user{
        display: flex;
        align-items: center;
        margin-top:10px;
        margin-bottom:15px;
    }
    .consultant-reply-content{
        padding: 10px;
        background: #f9f9f9;
        border-radius: 10px 10px 0 10px;
        box-shadow: 0 0px 10px rgb(0 0 0 / 15%);
        
    }
    .consultant-reply-content p{
        font-size: 1.2rem !important;
    }
    .consultant-reply-actions{
        display: flex;
        justify-content: end;
        padding-left: 10px;
    }
    .consultant-reply-actions a,.consultant-reply-actions button{
        /* width: 30px !important;
        height: 30px; */
        padding: 8px;
        border-radius: 50% !important;
        color: white;
        box-shadow: 0 0px 10px rgb(0 0 0 / 15%);
        margin-right: 5px;
    }
    .consultant-reply-actions a.success ,.consultant-reply-actions button.success{
        background: #2ecc71;

    }
    .consultant-reply-actions a.danger , .consultant-reply-actions button.danger{
        background: #fa2a00
    }
    .voyager-check:before {
        font-size: 1.5rem;
    }
    .voyager-x:before {
        font-size: 1.5rem;
    }
    .consultant-reply-actions i{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>    
<script>
    window.onload = function () {
        var $rejectBtn = $('.reject_btn');
        var $rejectModal = $('#reject_modal');

        $rejectModal.appendTo('body');
        $rejectBtn.on('click',function (e) {
                
                var arr = ($(e.target).attr('class')).split('id_');
                // console.log(e.target);
                // console.log(arr[1]);
                $('#rejection_id').val(arr[1]);
                $rejectModal.modal('show');
            });
    }
    
</script>
@stop