@extends('mail.layout')

@section('content')
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
                Hệ thống nhận được yêu cầu xuất file luận giải từ tài khoản {{ $user["email"] }}.
                <br /><br />
                File luận giải đã được đính kèm phía đưới, cảm ơn bạn đã sử dụng dịch vụ.
                <br /><br />
                Trân trọng,
                <br />
                WEB: thansohocsala.com
            </td>
        </tr>
    </tbody>
@endsection
