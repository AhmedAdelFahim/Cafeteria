let products = document.getElementsByClassName("selectProduct");

function removeOrder(id) {
    window.location.href = `createOrder.php/?status=remove&id=${id}`;
}

let total = 0;

for (let product of products) {
    product.addEventListener('click', () => {
        // <div id="selectedProds">
        //     <span><?php echo $product->name; ?></span>
        //     <input type="number" name="quantity[]" id="quantity" value="1"><input type="hidden" name="products[]" value="<? echo $product->id ?>"><input type="hidden" name="price[]" value="<? echo $product->price; ?>">
        //     <span>EGP <? echo $product->price ?></span>
        //     <button type="button" onclick="removeOrder(<? echo $product->id; ?>)">X</button>
            
        // </div>
        // <hr>

        let exist = document.getElementsByClassName(product.getAttribute("data-name"))[0];
        let totalPrice = document.getElementById("totalPrice");
    
        //If it isn't "undefined" and it isn't "null", then it exists.
        if(typeof(exist) != 'undefined' && exist != null){
            let value = exist.children[1].value;
            let quantity = ++value;
            exist.children[1].value = quantity;

            let prodPrice = exist.children[3].value;
            let allPrice = prodPrice * quantity;
            exist.children[4].innerHTML = "EGP " + allPrice;

            total = total + Number(prodPrice);
            
            
        }else{
            let div = document.createElement("div");
            div.setAttribute('id','selectedProds');
            div.setAttribute("class", product.getAttribute("data-name"));
        
            let span1 = document.createElement("span");
            span1.innerHTML=product.getAttribute("data-name");
        
            let input = document.createElement("input");
            input.setAttribute("type", "number");
            input.setAttribute("name", "quantity[]");
            input.setAttribute("min", 1);
            input.setAttribute("value", 1);

            input.addEventListener('input' , () => {
                let allPrice = product.getAttribute("data-price") * input.value;

                let priceSection = span2.innerHTML.split(" ");
                total = total - Number(priceSection[1]);

                total = total + allPrice;
                console.log(total);
                
                span2.innerHTML = "EGP " + allPrice;
                totalPrice.innerHTML = "EGP " + total;
            });
        
            let inputHidden1 = document.createElement("input");
            inputHidden1.setAttribute("type", "hidden");
            inputHidden1.setAttribute("name", "products[]");
            inputHidden1.setAttribute("value", product.getAttribute("data-id"));
        
            let inputHidden2 = document.createElement("input");
            inputHidden2.setAttribute("type", "hidden");
            inputHidden2.setAttribute("name", "prices[]");
            inputHidden2.setAttribute("value", product.getAttribute("data-price"));
        
            let span2 = document.createElement("span");
            span2.innerHTML = "EGP "+product.getAttribute("data-price");

            total = total + Number(product.getAttribute("data-price"));
            console.log(total);
            
        
            let button = document.createElement("button");
            button.setAttribute("type", "button");
            button.addEventListener('click' , () => {
                div.parentNode.removeChild(div.nextSibling)
                div.remove();

                let priceSection = span2.innerHTML.split(" ");
                total = total - Number(priceSection[1]);

                totalPrice.innerHTML = "EGP " + total;
            });
            button.innerHTML = "X";
        
            let hr = document.createElement("hr");
        
            div.append(span1);
            div.append(input);
            div.append(inputHidden1);
            div.append(inputHidden2);
            div.append(span2);
            div.append(button);
        
            let form = document.getElementById("form");
        
            form.prepend(hr);
            form.prepend(div);
        }

        totalPrice.innerHTML = "EGP " + total;

        document.getElementById('total_price').value = total;
    });
}