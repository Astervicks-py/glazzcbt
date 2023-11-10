<form class="dict-cont">
    <div class="screen">
        <div class="searched">: Madness</div>
        <div class="result">
            <div class="definition">
                <h3>Definition:</h3>
                <p style="display:none" id="dict-load">loading... </p>
                <ol class="meaning-cont">
                    
                </ol>
            </div>
            
        </div>
    </div>
    <div class="searcharea">
        <input type="text" id="searchTerm" />
        <button class="search-btn">S</button>
    </div>
</form>
<div class="dict-btn">D</div>
<script>
    function $(e) {
        return document.querySelector(e);
    }
    $(".dict-btn").onclick = () => {
        $(".dict-cont").classList.toggle("show-dict");
    };

    $(".dict-cont").onsubmit = (e) =>{
        e.preventDefault();
        let word = $(".search")
        console.log("Submitted");
        getData("sad")
    }

    async function getData(word)
    {
        $("#dict-load").style.display = "block";
        fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${word}`)
        .then((res)=> res.json())
        .then((res) => {
            let data = res;
            $(".searched").innerHTML = data[0].word;
            let meanings = data[0].meanings;
            console.log(meanings)
            meanings.forEach(e => {
                let newList = document.createElement("li");
                let pos =  document.createElement("i");
                let meaning =  document.createElement("p");
                let synonymns =  document.createElement("p");
                meaning.innerHTML = e.definitions[0]['definition'];
                synonymns.innerHTML = e.definitions[0]['synonyms'].join(',');
                pos.innerHTML = e.partOfSpeech;
                newList.appendChild(pos);
                newList.appendChild(meaning);
                newList.appendChild(synonymns);
                $(".meaning-cont").appendChild(newList)

            });

        })
        .catch((e)=>{
            $("#dict-load").style.display = "none";
            $(".meaning-cont").innerHTML = "Something Went wrong. The word was either not found or error in connection."
        })
    }
</script>