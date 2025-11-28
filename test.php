<!DOCTYPE html>
<html>

<body>
    <button onclick="setLanguage('nl')">Nederlands</button>
    <button onclick="setLanguage('en')">English</button>

    <h1 id="title"></h1>
    <p id="description"></p>
    <p id="test123"></p>

</body>
<script>
let translations;

fetch("translations.json")
.then(res => res.json())
.then(data => {
  translations = data;

  const userLang = navigator.language.startsWith("nl") ? "nl" : "en";
  setLanguage(userLang);
});

function setLanguage(lang) {
  Object.entries(translations[lang]).forEach(([key, value]) => {
    const selectedElement = document.getElementById(key);
    if(selectedElement){
      selectedElement.innerText = value;
    }
  });
}
</script>

</html>