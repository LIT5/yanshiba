$(function() {
    // body...
    /** 获取随机颜色：闭包调用自身，通过三元运算符递归，随机生成1个字符，然后再串到一起，直到生成6个结束并返回。
    首先从getRandomColor函数里面传过来一个空字符串，
    连接上'0123456789abcdef'字符串里面随机的一个字母，也就是这段代码：color += '0123456789abcdef'[Math.floor(Math.random()*16)]；
    然后判断color这个变量的长度是不是为6，
    因为标准的颜色值是一个长度为6的字符串，第一次执行为1，所以不满足
    最后执行问号后面的arguments.callee(color)；自调用。
    */
    var getRandomColor = function() {
        return '#' +
            (function(color) {
                return (color += '0123456789abcdef' [Math.floor(Math.random() * 16)]) && (color.length == 6) ? color : arguments.callee(color);
            })('');
    }

    $('ul').css({
        "margin": "0px",
        "padding": "0px",
        "list-style": "none"
    }).children().each(function() {
        var li = $(this);
        li.css({
            "width": "200px",
            "height": "120px",
            "float": "left",
            "line-height": "120px",
            "text-align": "center",
            "color": "#fff",
            "cursor": "pointer",
            "background-color": getRandomColor()
        });
    })
})