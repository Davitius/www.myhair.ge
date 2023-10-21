function getSelectValue() {
    var selectedValue = document.getElementById("city").value;

    let input1 = document.getElementById("location1");
    let input2 = document.getElementById("location2");
    let input3 = document.getElementById("location3");
    let input4 = document.getElementById("location4");
    let input5 = document.getElementById("location5");
    let input6 = document.getElementById("location6");
    let input7 = document.getElementById("location7");
    let input8 = document.getElementById("location8");
    let input9 = document.getElementById("location9");
    let input10 = document.getElementById("location10");
    let input11= document.getElementById("location11");
    let input12 = document.getElementById("location12");

    input1.setAttribute("value", selectedValue);
    input2.setAttribute("value", selectedValue);
    input3.setAttribute("value", selectedValue);
    input4.setAttribute("value", selectedValue);
    input5.setAttribute("value", selectedValue);
    input6.setAttribute("value", selectedValue);
    input7.setAttribute("value", selectedValue);
    input8.setAttribute("value", selectedValue);
    input9.setAttribute("value", selectedValue);
    input10.setAttribute("value", selectedValue);
    input11.setAttribute("value", selectedValue);
    input12.setAttribute("value", selectedValue);
}
