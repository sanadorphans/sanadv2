@extends('users.layout.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/section-2.css') }}">

    <style>
        @font-face {
            font-family: 'dli';
            src: url('/fonts/DINNextLTArabic-Regular-2.ttf');
        }

        .br-img {
            height: 60px;
        }

        @media (max-width: 520px) {
            .bs-stepper-content {
                padding: 0 20px 20px;
            }

            .bs-stepper-header {
                margin: 0 10px;
                text-align: center;
            }
        }

        @media (max-width:766px) {
            .br-img {
                height: 40px;
            }

            .tx-sm {
                font-size: 14px
            }
        }


        section .chat-box .text-box {
            width: 100%;
            height: auto;
        }


        /* section .chat-box:nth-child(odd) {
                    direction: rtl;
                } */

        section .chat-box .image {
            margin-right: 10px;
            margin-left: 10px;
        }

        section .text-box .box-content .first-box {
            margin-bottom: 5px;
            width: 100%;
        }

        .footer-section .box-cont .text-cont {
            width: 100%;
            height: 136px;
        }

        .messagecontainer {
            border-radius: 6px;
            border: solid 1px #75767a;
            display: flex;
            justify-content: space-between;
            width: 750px;
            min-height: 44px;
            height: auto;
        }

        #file {
            display: none;
        }

        .file {
            display: flex;
            font-size: 32px;
            font-weight: bold;
            color: #75767a;
            border-right: 1px solid #75767a;
            padding: 4px 16px;
            cursor: pointer;
        }

        .send {
            width: 65px;
            padding: 4px 16px;
            display: flex;
        }

        .btn {
            border: none;
            font-size: 14px;
            line-height: 34px;
            background-color: transparent;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .input {
            flex-grow: 1;
            padding: 4px 16px;
            display: flex;
        }

        .text {
            width: 100%;
            font-size: 13px;
            font-family: Arial;
            resize: none;
            border: none;
        }

        .text:focus {
            outline: none;
        }
    </style>
@endsection


@section('content')
    <div class="content">
        <section style="display: contents;">
            <div class="container-fluid chat-boxes">
                <div class="chat-box">
                    <div class="image">
                        <img src="{{ filter_var($data->user->avatar, FILTER_VALIDATE_URL) ? $data->user->avatar : Voyager::image($data->user->avatar) }}"
                            alt="">
                        <span>{{ $data->user->name }}</span>
                    </div>
                    <div class="text-box shadow-sm" style="background: #bbe1e6">
                        <div class="box-content">
                            <div class="first-box">
                                <p style="font-weight: bold;color:black">{{ $data->title }}</p>
                                <p style="color:black">{!! $data->content !!}</p>
                                @if ($data->attachment)
                                    <div>
                                        <a style="color: #0078f9;text-decoration: underline;background-color: transparent;"
                                            target="_blank" href="{{ $data->attachment }}">{{ __('site.attachment') }}</a>

                                    </div>
                                @endif

                                <div class="text-white mt-3 d-flex justify-content-end" style="color: black !important">
                                    {{ $data->created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($data->status == 'rejected' && $data->admin_rejection_comment)
                    <div class="chat-box">

                        <div class="text-box shadow-sm" style="background-color: #ffc4c4;">
                            <div class="box-content">
                                <div class="first-box">
                                    <h6 style="color: black;font-weight:bold">{{ __('site.rejection reason') }} :</h6>
                                    <p style="color: black">{!! $data->admin_rejection_comment !!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($replies as $reply)
                    @if ($reply->owner == 0 && $reply->status == 'approved')
                        <div class="chat-box">
                            <div class="image">
                                <img src="{{ filter_var($reply->consultant->user->avatar, FILTER_VALIDATE_URL) ? $reply->consultant->user->avatar : Voyager::image($reply->consultant->user->avatar) }}"
                                    alt="">
                                <span>{{ $reply->consultant->user->name }} <span
                                        class="text-success">({{ __('site.consultant') }})</span> </span>
                            </div>
                            <div class="text-box shadow-sm" style="background-color: #efefef;">
                                <div class="box-content">
                                    <div class="first-box">
                                        <p style="color: black">{!! $reply->content !!}</p>
                                        @if ($reply->attachment)
                                            <div>
                                                <a style="color: #0078f9;text-decoration: underline;background-color: transparent;"
                                                    target="_blank"
                                                    href="{{ $reply->attachment }}">{{ __('site.attachment') }}</a>

                                            </div>
                                        @endif

                                        @if ($reply->meeting_url)
                                            <div class="mt-3">
                                                <p style="color: #098cff"><i
                                                        class="fa-solid fa-circle-info mx-2"></i>{{ __('site.The consultant request for a meeting at : ') . $reply->meeting_time }}
                                                </p>
                                                <a href="{{ $reply->meeting_url }}" target="_blank"
                                                    class="btn btn-primary @if ($reply->meeting_time > now()->addMinutes(30) || $reply->meeting_time < now()->subMinutes(30)) disabled @endif"
                                                    style="background: #098cff;padding:5px 10px !important;"><img
                                                        src="{{ asset('img/zoom.png') }}" class="mx-1"
                                                        style="height: 40px" alt=""><span
                                                        class="mx-1">{{ __('site.start meeting') }}</span></a>
                                            </div>
                                        @endif


                                        <div class="mt-3 d-flex justify-content-end" style="color:black">
                                            {{ $reply->created_at }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($reply->owner == 1)
                        <div class="chat-box">
                            <div class="image">
                                <img src="{{ filter_var($user->avatar, FILTER_VALIDATE_URL) ? $user->avatar : Voyager::image($user->avatar) }}"
                                    alt="">
                                <span>{{ $user->name }}</span>
                            </div>
                            <div class="text-box shadow-sm" style="background: #bbe1e6">
                                <div class="box-content">
                                    <div class="first-box">
                                        <p style="color: black">{!! $reply->content !!}</p>
                                        @if ($reply->attachment)
                                            <div>
                                                <a style="color: #0078f9;text-decoration: underline;background-color: transparent;"
                                                    target="_blank"
                                                    href="{{ $reply->attachment }}">{{ __('site.attachment') }}</a>

                                            </div>
                                        @endif

                                        <div class="mt-3 d-flex justify-content-end" style="color: black !important">
                                            {{ $reply->created_at }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            @if ($data->status == 'assigned')
                <div class="footer-section">
                    <div class="container-fluid">
                        <span>Your Answer</span>
                        <div class="box-cont">
                            <img src="{{ asset('img/wataneya logo middle3.png') }}" alt="">
                            <div class="text-cont">
                                <form class="d-block" id="FormMessage" class="send" enctype="multipart/form-data">
                                    @csrf
                                    <textarea class="px-2 w-100 shadow-sm" rows="5" style="border-radius: 5px;" name="content" id=""
                                        required></textarea>
                                    <div class="d-flex align-items-top">
                                        <button class="btn btn-white shadow-sm " type="submit"
                                            style="height:43px;background: white;padding: 3px 8px !important;color:black;border: 1px solid #999999;">
                                            <img style="width: 20px;height:auto" src="{{ asset('img/Fill 2.png') }}"
                                                alt="">
                                            <span class="mx-1 my-0 d-inline-block">{{ __('site.send') }}</span>
                                        </button>

                                        <div class="d-inline-block mx-2">
                                            <button type="button" onclick="importData()" class="btn btn-white shadow-sm "
                                                style="background: white;padding: 3px 8px !important;color:black;border: 1px solid #999999;">
                                                <img style="width: 20px;height:auto"
                                                    src="{{ asset('img/attachment.png') }}" alt="">
                                                <span
                                                    class="mx-1 my-0 d-inline-block">{{ __('site.add attachment') }}</span>
                                            </button>
                                            <div id="files">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" id="file" onchange="showFile()" name="attachment" />
                                </form>
            @endif
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>
@endsection



@section('js')
    <script>
        function importData() {
            let input = $('#file');
            input.click();
        }

        function showFile() {
            let files = $('#file').prop('files');
            $('#files').text(files[0].name);
        }
        Date.prototype.yyyymmdd = function() {
            var yyyy = this.getFullYear().toString();
            var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
            var dd = this.getDate().toString();
            var hh = this.getHours().toString();
            var mm = this.getMinutes().toString();
            var ss = this.getSeconds().toString();
            return yyyy + "/" + (mm[1] ? mm : "0" + mm[0]) + "/" + (dd[1] ? dd : "0" + dd[0]) + ' ' + hh + ':' + mm +
                ':' + ss; // padding
        };

        var date = new Date();
        // live create forms
        $("#FormMessage").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ url('users/consultation/chat/store/' . $data->id) }}',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    $('.chat-boxes').append(`
                <div class="chat-box">
                        <div class="image">
                            <img src="/storage/{{ Auth::user()->avatar }}" alt="">
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                        <div class="text-box shadow-sm" style="background-color: #efefef;">
                            <div class="box-content">
                                <div class="first-box">
                                    <p style="color: black">${ res.reply.content }</p>
                                        ${res.reply.attachment != '' ?
                                        `<div><a style="color: #0078f9;text-decoration: underline;background-color: transparent;" target="_blank" href="${ res.reply.attachment }">{{ __('site.attachment') }}</a></div>`
                                        : '' }
                                        ${res.reply.meeting_url != undefined ?
                                        `<div class="mt-3"><a href="${ res.reply.meeting_url}" target="_blank"><button class="btn btn-primary" style="background: #098cff;padding:5px 10px !important;">{{ __('site.start meeting') }}</button></a></div>`
                                        : '' }
                                    <div class="mt-3 d-flex justify-content-end" style="color:black">${ date.yyyymmdd() }</div>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
                    // console.log('succass')
                }
            });
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Echo.channel('Messages').listen('.order.messages', e => {
        //     document.querySelector('.chat-boxes').innerHTML += `
        //             <div class="chat-box">
        //                     <div class="image">
        //                         <img src="/storage/{{ Auth::user()->avatar }}" alt="">
        //                         <span>{{ Auth::user()->name }}</span>
        //                     </div>
        //                     <div class="text-box shadow-sm" style="background-color: #efefef;">
        //                         <div class="box-content">
        //                             <div class="first-box">
        //                                 <p style="color: black">${ e.messageContent }</p>
        //                                     ${e.attachments != '' ?
        //                                     `<div><a style="color: #0078f9;text-decoration: underline;background-color: transparent;" target="_blank" href="${ e.attachments }">{{ __('site.attachment') }}</a></div>`
        //                                     : '' }
        //                                 <div class="mt-3 d-flex justify-content-end" style="color:black">${ date.yyyymmdd() }</div>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             `
        // })
    </script>
@endsection
