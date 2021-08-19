
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF - Thần Số Học Sala</title>
    <style>
        @font-face {
            font-family: Futura Std;
            src: url(/fonts/Futura/FuturaSTD-Light.otf);
            font-weight: 100;
        }
        @font-face {
            font-family: Futura Std;
            src: url(/fonts/Futura/FuturaSTD-Book.otf);
            font-weight: 200;
        }
        @font-face {
            font-family: Futura Std;
            src: url(/fonts/Futura/FuturaSTD-Medium.otf);
            font-weight: 500;
        }
        body * {
            font-family: Futura Std !important;
        }
        .main-session {
            margin: auto;
            max-width: 100%;
            width: 1920px;
            height: 1358px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .fix-text * {
            background: unset !important;
            background-color: unset !important;
        }
        .fix-text {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .fw-100 {
            font-weight: 100;
        }
        .fw-200 {
            font-weight: 200;
        }
        .fw-500 {
            font-weight: 500;
        }
        .position-relative {
            position: relative;
        }
        .position-absolute {
            position: absolute;
        }
        .text-white * {
            color: #eff1f3 !important;
        }
        .text-dark * {
            color: #4D4D4F !important;
        }
        .top-0 {
            top: 0;
        }
        .info {
            color: #135549;
            right: 234px;
            top: 564px;
            line-height: 50px;
            width: 320px;
            overflow: hidden;
            font-size: 22pt;
        }
        .fs-29 * {
            font-size: 29px !important;
        }
        .text-option-1 {
            right: 70px;
            width: 680px;
            top: 145px;
            -webkit-line-clamp: 28;
        }
    </style>
</head>
<body style="margin: 0;">

    <div class="main-session" style="background-image: url('/PDF/Artboard 2@3x.png'); background-size: contain;"></div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 3@3x.png')">
        <div class="info fw-500 position-absolute">
            <div class="name">{{ $result->name }}</div>
            <div class="birthday">{{ $result->birthdate }}</div>
            <div class="email">{{ $result->email }}</div>
            <div class="phone">{{ $result->phone }}</div>
        </div>
    </div>
    <div class="main-session" style="background-image: url('/PDF/Artboard 5@3x.png')"></div>
    <div class="main-session" style="background-image: url('/PDF/Artboard 7@3x.png')"></div>
    <div class="main-session" style="background-image: url('/PDF/Artboard 9@3x.png')"></div>

    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 11@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-white fw-200 fs-29 fix-text">
            {!! $result->data["TAM_HON"] !!}
        </div>
    </div>

    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 13@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-dark fw-200 fs-29 fix-text">
            {!! $result->data["NHAN_CACH"] !!}
        </div>
    </div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 15@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-dark fw-200 fs-29 fix-text">
            {!! $result->data["CAN_BANG_TH_NC"] !!}
        </div>
    </div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 17@3x.png')"></div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 19@3x.png')"></div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 21@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-dark fw-200 fs-29 fix-text">
            {!! $result->data["CAN_BANG"] !!}
        </div>
    </div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 23@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-white fw-100 fs-29 fix-text">
            @foreach ($result->data["KHUYET_THIEU"] as $line)
                <div>
                    {!! $line !!}
                </div>
            @endforeach
        </div>
    </div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 25@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-white fw-100 fs-29 fix-text">
            @foreach ($result->data["THACH_THUC"] as $line)
                <div>
                    {!! $line !!}
                </div>
            @endforeach
        </div>
    </div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 27@3x.png')">
        <div class="text-option-1 position-absolute top-0 text-white fw-100 fs-29 fix-text">
            @foreach ($result->data["CHI_SO_LAP"] as $line)
                <div>
                    {!! $line !!}
                </div>
            @endforeach
        </div>
    </div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 29@3x.png')"></div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 33@3x.png')"></div>
    <div class="main-session position-relative" style="background-image: url('/PDF/Artboard 93@3x.png')"></div>
</body>
</html>
