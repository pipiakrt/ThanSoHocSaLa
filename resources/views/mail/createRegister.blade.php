
@extends('mail.layout')

@section('content')
    <tbody>
        <tr>
            <td valign="top">
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="padding-top: 5px; padding-left: 1vw; padding-bottom: 5px; padding-right: 0.5vw;">
                                <table border="0" cellpadding="18" cellspacing="0" width="100%" style="min-width: 100% !important; border-collapse: collapse;">
                                    <tbody>
                                        <tr>
                                            <td
                                                valign="top"
                                                style="
                                                    color: #333;
                                                    font-family: Arial, Helvetica, sans-serif;
                                                    font-size: 13px;
                                                    font-style: normal;
                                                    font-weight: normal;
                                                    line-height: 135%;
                                                    text-align: justify;
                                                    word-break: break-word;
                                                "
                                            >
                                                Chào bạn <b>{{ $user["name"] }}</b>, <br />
                                                <br />
                                                Bạn đã đăng kí tài khoản {{ $user['email'] }}, tại Thận Số Học Sala.
                                                <br /><br />
                                                Click vào <a href="https://thansohocsala.com/tai-khoan/doi-mat-khau?token={{ $token }}" target="_blank">link này</a> để nhập mật khẩu của bạn!
                                                <br /><br />
                                                Trân trọng,
                                                <br />
                                                WEB: thansohocsala.com
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
@endsection
