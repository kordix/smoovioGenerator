<template>
<div class="container">
    <button @click="copy()">zaznacz tabelę</button>
    <table id="tabela">
        <thead>
            <tr>
                <td>Kod</td>
                <td>Opis</td>
                <td>Cena</td>
                <!-- <td>Cena</td> -->
            </tr>
        </thead>
        <tbody>
            <tr v-for="elem in output">
                <td>
                    {{elem.kod}}

                </td>
                <td>{{elem.opis}}</td>
                <td>{{elem.cena}}</td>

                <!-- <td>{{elem.cena}}</td> -->
            </tr>
        </tbody>
    </table>

</div>
</template>

<script>
export default {
    data() {

        return {
            output: [],
            profile: [
                    {kod:'5860',opis:'oscieznica 74 / 150 MM',cena:{biale:'9,01',ZW:'10,9',O:'12,25' } },
                    {kod:'5862',opis:'skrzydlo 92 / 74 MM',cena:{biale:'7,63',ZW:'9,05',O:'10,12'}},
                    {kod:'5863',opis:'profil do szklenia stalego 59,5 / 74 MM',cena:{biale:'5,64',ZW:'6,82',O:'7,26'} },
                    {kod:'5868',opis:'profil labiryntowy 14 / 31 MM',cena:{biale:'1,69',ZW:'2,54',O:'3,14'} },
                    {kod:'8036',opis:'szpros konstrukcyjny 66 / 74 MM',cena:{biale:'4,57',ZW:'5,55',O:'6,85'} }
            ],
            profile2:[
                    {kod:'5861',opis:'profil maskujacy Smoovio 8 / 63 MM',cena:{biale:'2,32',kolor:'3,36'}},
                    {kod:'5869',opis:'profil wyrownujacy Smoovio 19,5 / 57 MM',cena:{biale:'2,99',kolor:'3,86'} },
            ],
            listwy:[
                {kod:'7116',opis:'Listwa',cena:{bialeszara:'0,66',bialeczarna:'0,66',kolor:'1,65'}},
                {kod:'7180',opis:'Listwa',cena:{bialeszara:'0,83',bialeczarna:'0,83',kolor:'1,64'}},
                {kod:'7134',opis:'Listwa',cena:{bialeszara:'0,62',bialeczarna:'0,62',kolor:'1,45'}},
                {kod:'7131',opis:'Listwa',cena:{bialeszara:'0,71',bialeczarna:'0,71',kolor:'1,18'}},
                {kod:'7156',opis:'Listwa',cena:{bialeszara:'0,66',bialeczarna:'0,66',kolor:'1,18'}},
                {kod:'7142',opis:'Listwa',cena:{bialeszara:'0,91',bialeczarna:'0,91',kolor:'1,86'}},
                {kod:'7146',opis:'Listwa',cena:{bialeszara:'1,16',bialeczarna:'1,16',kolor:'2,01'}},
                {kod:'7130',opis:'Listwa',cena:{bialeszara:'0,74',bialeczarna:'0,74',kolor:'1,44'}},
                {kod:'7144',opis:'Listwa',cena:{bialeszara:'0,76',bialeczarna:'0,76',kolor:'1,76'}},
                {kod:'7162',opis:'Listwa',cena:{bialeszara:'0,64',bialeczarna:'0,64',kolor:'1,39'}},
                {kod:'7138',opis:'Listwa',cena:{bialeszara:'0,86',bialeczarna:'0,86',kolor:'1,66'}},
                {kod:'7164',opis:'Listwa',cena:{bialeszara:'0,74',bialeczarna:'0,74',kolor:'1,39'}},
                {kod:'7122',opis:'Listwa',cena:{bialeszara:'0,79',bialeczarna:'0,79',kolor:'1,59'}},
                {kod:'7248',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7242',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7244',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7240',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7236',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7234',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7232',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7226',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7224',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7222',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7220',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'5144',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'5140',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'5136',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'5128',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'5124',opis:'Listwa',cena:{bialeszara:'9999',bialeczarna:'9999',kolor:'9999'}},
                {kod:'7120',opis:'Listwa',cena:{bialeszara:'1,38',bialeczarna:'1,38',kolor:'2,34'}},
                {kod:'7129',opis:'Listwa',cena:{bialeszara:'1,37',bialeczarna:'1,37',kolor:'2,74'}},
                {kod:'7154',opis:'Listwa',cena:{bialeszara:'0,62',bialeczarna:'0,62',kolor:'1,35'}},
                {kod:'7119',opis:'Listwa',cena:{bialeszara:'1,66',bialeczarna:'1,66',kolor:'2,67'}},
                {kod:'7196',opis:'Listwa',cena:{bialeszara:'0,89',bialeczarna:'0,89',kolor:'1,78'}},
                {kod:'7194',opis:'Listwa',cena:{bialeszara:'0,75',bialeczarna:'0,75',kolor:'1,55'}}
                ]
            ,
            strony:[
                {kod:'Z',opis:'zewnatrz'},
                {kod:'W',opis:'wewnatrz'},
                {kod:'O',opis:'obustronnie'}
            ],

            uszczelki:[
                {kod:'S',opis:'usz.szara'},
                {kod:'C',opis:'usz.czarna'}

            ],
            grupy:[
                '0','6','10','20'
            ],
    
        }
    },
    methods:{
    selectElementContents(el) {
        var body = document.body,
            range, sel;
        if (document.createRange && window.getSelection) {
            range = document.createRange();
            sel = window.getSelection();
            sel.removeAllRanges();
            try {
                range.selectNodeContents(el);
                sel.addRange(range);
            } catch (e) {
                range.selectNode(el);
                sel.addRange(range);
            }
        } else if (body.createTextRange) {
            range = body.createTextRange();
            range.moveToElementText(el);
            range.select();
        }
    },
    generate(){
    for(let profil of this.profile){
           for(let strona of this.strony){
                    for(let grupa of this.grupy){
                    let kod = `PG_${profil.kod}_${strona.kod}_${grupa}`
                    let opis = `${profil.opis} ${profil.kod} ${strona.opis} usz.czarna ${grupa}%`
                    let cena = 0;
                    let cenabase = 0;
                    if(strona.kod == 'Z' || strona.kod == 'W'){
                        cenabase = profil.cena.ZW
                    }

                    if(strona.kod == 'O'){
                        cenabase = profil.cena.O
                    }
                    cena = Math.round(parseFloat(cenabase.replace(',', '.')) * (1 + parseFloat(grupa) / 100) * 100) / 100

                    this.output.push({kod:kod,opis:opis,cena:cena})
                    }
           }
       }
    },
    generate2(){
            let  strony = [
                {kod:'D',opis:'dekor'}
            ]

        for(let profil of this.profile2){
           for(let strona of strony){
                    for(let grupa of this.grupy){
                    let kod = `PG_${profil.kod}_${strona.kod}_${grupa}`
                    let opis = `${profil.opis} ${profil.kod} ${strona.opis} usz.czarna ${grupa}%`
                    let cenabase =  profil.cena.kolor;

                    let cena = Math.round(parseFloat(cenabase.replace(',', '.')) * (1 + parseFloat(grupa) / 100) * 100) / 100;
                   

                    this.output.push({kod:kod,opis:opis,cena:cena})
                    }
           }
       }

    },
    generateBiale(){
        this.output.push({kod:'PG_5862_B_S',opis: 'skrzydlo 5862 92 / 74 MM biale usz.szara',cena:'7,79' })
        this.output.push({kod:'PG_8036_B_S',opis: 'szpros konstrukcyjny 8036 66 / 74 MM usz.szara ',cena:'4,73' })
        this.output.push({kod:'PG_5861_B',opis: 'profil maskujacy Smoovio biale 8 / 63 MM  ',cena:'2,32' })
        this.output.push({kod:'PG_5869_B',opis: 'profil wyrownujacy Smoovio biale 19,5 / 57 MM  ',cena:'2,99' })

        for(let profil of this.profile){
                    let kod = `PG_${profil.kod}_B`
                    let opis = `${profil.opis} ${profil.kod} biale usz.czarna`
                    let cena = `${profil.cena.biale}`


                    this.output.push({kod:kod,opis:opis,cena:cena})
           }
    },
    generateListwy(){
        let kolory = [
            // {kod:'B',opis:'biale'},
            {kod:'D',opis:'dekor'}
        ]

        for(let listwa of this.listwy){
            for(let kolor of kolory){
                for(let grupa of this.grupy){
                let kod = `PG_${listwa.kod}_${kolor.kod}_${grupa}`
                let opis = `Listwa ${listwa.kod} ${kolor.opis} usz.czarna ${grupa} %`
                let cenabase =  listwa.cena.kolor;

                let cena = Math.round(parseFloat(cenabase.replace(',', '.')) * (1 + parseFloat(grupa) / 100) * 100) / 100;

                this.output.push({kod:kod,opis:opis,cena:cena})

                }
            }
        }

    },
    generateListwyBiale(){
         let kolory = [
            {kod:'B',opis:'biale'},
            // {kod:'D',opis:'decco'}
        ]

        let uszczelki = [
            {kod:'S',opis:'usz.szara'},
            {kod:'C',opis:'usz.czarna'},

        ]

        for(let listwa of this.listwy){
            for(let kolor of kolory){
                for(let uszczelka of uszczelki){
                let kod = `PG_${listwa.kod}_${kolor.kod}_${uszczelka.kod}`
                let opis = `Listwa ${listwa.kod} ${kolor.opis} ${uszczelka.opis}`
                let cena = 0;

                if(uszczelka.kod == 'S'){
                    cena = listwa.cena.bialeszara
                }

                if(uszczelka.kod == 'C'){
                    cena = listwa.cena.bialeczarna
                }

                this.output.push({kod:kod,opis:opis,cena:cena})

                }

            }
        }


    },
    copy() {
        this.selectElementContents(document.getElementById('tabela'));
    }

},
mounted() {
    let self = this;
      this.generateBiale();
      this.generate2();
      this.generate();
      this.generateListwyBiale();
      this.generateListwy();



    // this.generateBiale()
    console.log(parseFloat('2.25'));

}

}
</script>

<style scoped>
p {
    margin: 0px;
    padding: 0px;
    font-weight: bold;
}

td {
    border: 1px black solid;
}
</style>
