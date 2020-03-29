<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        請求先：
        <select name="" id="">
            <option value="">client1</option>
            <option value="">client2</option>
            <option value="">client3</option>
        </select>
        <section>
            <dl style="display:flex;">
                <dt>内容1</dt>
                <dd>
                    <select name="" id="">
                        <option value="">業務委託料（準委任）</option>
                        <option value="">業務委託料（請負）</option>
                    </select>
                </dd>
                <dd>
                    時間：<input type="number" name="" id="">
                </dd>
                <dd>
                    単価：<input type="number" name="" id="">
                </dd>
                <dd>
                    <label>
                        <input type="radio" name="1" id="">
                        税込
                    </label>
                    <label>
                        <input type="radio" name="1" id="">
                        税抜
                    </label>
                </dd>
            </dl>
        </section>
        <section>
            <dl style="display:flex;">
                <dt>内容2</dt>
                <dd>
                    <select name="" id="">
                        <option value="">業務委託料（準委任）</option>
                        <option value="">業務委託料（請負）</option>
                    </select>
                </dd>
                <dd>
                    時間：<input type="number" name="" id="">
                </dd>
                <dd>
                    単価：<input type="number" name="" id="">
                </dd>
                <dd>
                    <label>
                        <input type="radio" name="2" id="">
                        税込
                    </label>
                    <label>
                        <input type="radio" name="2" id="">
                        税抜
                    </label>
                </dd>
            </dl>
        </section>
        <button>
            pdfを出力
        </button>
    </form>
</body>
</html>