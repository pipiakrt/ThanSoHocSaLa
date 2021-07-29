const { default: axios } = require("axios");

module.exports.Auth = () => 
{
    let token = window.localStorage.getItem('token');

    axios.defaults.headers.common = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    };

    return true
}

module.exports.SetToken = (token) => 
{
    token = window.localStorage.setItem('token', token);
    axios.defaults.headers.common = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    };
}

module.exports.ChangeToSlug = (title) => 
{
    //Đổi chữ hoa thành chữ thường
    var slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');

    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');

    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");

    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');

    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    return slug;
}

module.exports.AddScript = (scripts) => 
{
    scripts.forEach(script => {
        let tag = document.createElement("script");
        tag.setAttribute("src", script);
        document.head.appendChild(tag);
    });
}

module.exports.AddStyle = (styles) => 
{
    styles.forEach(style => {
        document.querySelector('head').innerHTML += '<link rel="stylesheet" href="'+ style +'" type="text/css"/>'
    });
}

module.exports.TrueArray = (flat) => 
{
    const root = [];
    flat.forEach(node => {
        if (!node.parent_id) return root.push(node);
        const parentIndex = flat.findIndex(el => el.id === node.parent_id);
        if (!flat[parentIndex].children) {
            return flat[parentIndex].children = [node];
        }
        flat[parentIndex].children.push(node);
    });
    return root;
}

module.exports.LoadPage = () => 
{
    KTApp.blockPage({
        overlayColor: "#000000",
        state: "primary",
        message: "Đợi Xíu...",
    })
}

module.exports.Clipboard_CopyTo = (value) => 
{
    var tempInput = document.createElement("input");
    tempInput.value = value;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
}

module.exports.FormatText = (text, length) => 
{
    if (text == null) {
        return "";
    }
    if (text.length <= length) {
        return text;
    }
    text = text.substring(0, length);
    last = text.lastIndexOf(" ");
    text = text.substring(0, last);
    return text + "...";
}

module.exports.formartPrice = (amount, decimalCount = 0, decimal = ".", thousands = ".") => 
{
    decimalCount = Math.abs(decimalCount);
    decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
    const negativeSign = amount < 0 ? "-" : "";
    let i = parseInt((amount = Math.abs(Number(amount) || 0).toFixed(decimalCount))).toString();
    let j = i.length > 3 ? i.length % 3 : 0;
    return (negativeSign + (j ? i.substr(0, j) + thousands : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - Number(i)).toFixed(decimalCount).slice(2) : "")) + ' VNĐ';
}

module.exports.generate = () => 
{
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}