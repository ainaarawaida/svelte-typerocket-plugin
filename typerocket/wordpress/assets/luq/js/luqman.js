
let getFetch = async (passdata = {}, viewpg = '', formid, url = '', nonce = '') => {
  
  document?.querySelector(".loader-wrapper") ? document.querySelector(".loader-wrapper").style.display = 'block' : '' ;
    let dataHeader = new Headers();
    // dataHeader.append("Accept", `application/json`);
    dataHeader.append("X-WP-NONCE", nonce);

    let dataArray = new FormData();
    dataArray.append('action', 'my_action');
    dataArray.append('viewpg', viewpg);

    if(formid){
        let input = document.querySelectorAll(`#${formid} input`)
        for (let a = 0; a < input.length; a++) {
            if(input[a].type == 'file'){
                dataArray.append(input[a].name, input[a].files[0]);
            } if(input[a].type == 'checkbox'){
              if(input[a].checked){
                dataArray.append(input[a].name, 1);
              }else{
                dataArray.append(input[a].name, 0);
              }
            }else{
                dataArray.append(input[a].name, input[a].value);
            }

          
        
        }
        input = document.querySelectorAll(`#${formid} textarea`)
        for (let a = 0; a < input.length; a++) {
          dataArray.append(input[a].name, input[a].value);
        }

        input = document.querySelectorAll(`#${formid} select`)
        for (let a = 0; a < input.length; a++) {
          dataArray.append(input[a].name, input[a].value);
        }
    }

    for(let a = 0 ; a < Object.keys(passdata).length; a ++){
        dataArray.append(Object.keys(passdata)[a], passdata[Object.keys(passdata)[a]]);
    }

   
    let getFetch2 = await fetch(
        `${url}`, {
        method: 'POST',
        body: dataArray,
        headers: dataHeader,
      }
    );

    let getFetchData = await getFetch2.json();
    document?.querySelector(".loader-wrapper") ? document.querySelector(".loader-wrapper").style.display = 'none' : '';
    // console.log('luqgetFetchData',getFetchData)
    return getFetchData;
}

let printFunc = async (e) => {
  // console.log("baseurl",baseurl)
  await new Promise((resolve) => setTimeout(resolve, 200));
  let divToPrint = document.getElementById("printarea");

  let data = document.getElementById("printarea").innerHTML;
  let myWindow = window.open("", "my div", "height=400,width=600");
  myWindow.document.write("<html><head><title>my div</title>");
  myWindow.document.write(
    '<link rel="stylesheet" href="' + `${asseturl}luq/assets/css/bootstrap.css` + '" type="text/css" />'
  );
  myWindow.document.write("</head><body >");
  myWindow.document.write(data);
  myWindow.document.write("</body></html>");
  myWindow.document.close(); // necessary for IE >= 10

  myWindow.onload = function() {
    // necessary if the div contain images

    myWindow.focus(); // necessary for IE >= 10
    myWindow.print();
    myWindow.close();
  };

};