<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLearningPoint</title>

    <!-- Basic style -->
    <style>
        .item-container {
            margin: 20px auto;
            width: 50%;
        }

        .btn-container {
            text-align: center;
        }

        li {
            display: inline-block;
            padding: 20px;
        }

        .selected {
            background-color: rgb(25, 121, 211);
            color: ivory;
        }

        button {
            outline: none;
            padding: 12px;
            border: none;
            background-color: rgb(25, 121, 211);
            border-radius: 8px;
            color: white;
            cursor: pointer;
        }
    </style>


</head>

<body>
    <!-- HTML code for next and previous button -->
    <div class="item-containerx">

        <ul>
            <li>ITEM-1</li>
            <li>ITEM-2</li>
            <li>ITEM-3</li>
            <li>ITEM-4</li>
            <li>ITEM-5</li>
            <li>ITEM-6</li>
              <li>ITEM-7</li>
                <li>ITEM-8</li>
                  <li>ITEM-9</li>
        </ul>

        <div class="btn-containerc">
            <button class="pre" onclick="previous()">Previous</button>
            <button class="next" onclick="next()">Next</button>
        </div>
    </div>

    <!-- Javascript code for next and previous button -->
    <script>

        let children = document.querySelector('ul').children;
        let i = 0;

        children[i].classList.add('selected');// Item default selection

        function resetClass() {
            for (let j = 0; j < children.length; j++) {
                children[j].classList.remove('selected');
            }
        }

        function next() {
            if (i >= children.length - 1) {
                return false;
            }
            resetClass();
            i++;
            children[i].classList.add('selected')
        }

        function previous() {
            if (i <= 0) {
                return false;
            }
            resetClass();
            i--;
            children[i].classList.add('selected')
        }

    </script>

</body>

</html
