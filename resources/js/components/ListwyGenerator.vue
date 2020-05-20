<template>
<div class="container">
<button @click="copy()">zaznacz tabelę</button>
    <table id="tabela">
        <thead>
            <tr>
                <td>Kod</td>
                <td>Opis</td>
                <td>Cena</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="elem in output">
                <td>
                    {{elem.kod}}

                </td>
                <td>{{elem.opis}}</td>
                <td>{{elem.cena}}</td>
            </tr>
        </tbody>
    </table>

</div>
</template>

White: 	0
White VA.2:	0W
Braun:	7
Caramel:	8
Anthracite:	9

<script>
export default {
    data() {
        return {
            strony: [{
                kod: '1K',
                opis: '2-stronny'
            }],
            output: [],
            kolory: [],
            profile: [],
            bazy: [{
                    kod: 0,
                    opis: 'białe'
                },
                {
                    kod: 7,
                    opis: 'brąz'
                },
                {
                    kod: 8,
                    opis: 'karmel'
                },
                {
                    kod: 9,
                    opis: 'antracyt'
                }
            ]

        }
    },
    methods: {
        generateStrict() {
            let stronakod = '';
            let kolorkod = '';
            let self = this;
            for (let profil of this.profile) {
                for (let strona of this.strony) {
                    for (let kolor of this.kolory) {

                        stronakod = strona.kod
                 
                           console.log(kolor.kod);


                        if(['4','5','6','7','8','9'].indexOf(kolor.kod)>=0 ){
                            console.log('działa if');
                            stronakod = '';

                            if(strona.kod == '1K'){
                                kolorkod = '1'+kolor.kod
                            }

                            if(strona.kod == '2K'){
                                kolorkod = '2'+kolor.kod;
                            }

                        }else{
                            stronakod = '-'+strona.kod;
                            kolorkod = kolor.kod
                        }
                     
                     

                        let kod = profil.kod + '-'+kolor.bazakod + '-2' + stronakod + '-' + kolorkod;
                        let opis = profil.opis + ' ' + kolor.bazaopis + ' uszczelka czarna ' + kolor.opis;
                        let cenabase = profil.cena2k;

                        let cena = Math.round(parseFloat(cenabase.replace(',', '.')) * (1 + parseFloat(kolor.doplata) / 100) * 100) / 100

                        cena = cena.toString().replace('.', ',');


                        let object = {
                            kod: kod,
                            opis: opis,
                            cena: cena
                        }

                        this.output.push(object)

                    }
                }
            }

            if (this.output.length == 0) {
                console.log('nic nie ma');
                setTimeout(function () {
                    self.generateStrict();
                }, 3000)
            }
        },
        generateAll() {
            for (let profil of this.profile) {
                for (let strona of this.strony) {
                    for (let kolor of this.kolory) {
                        for (let baza of this.bazy) {
                            let kod = profil.kod + '-' + baza.kod + '-2-' + strona.kod + '-' + kolor.kod;
                            let opis = profil.opis + ' ' + kolor.opis + ' ' + strona.opis;
                            let object = {
                                kod: kod,
                                opis: opis,
                                cena: cena
                            }
                            this.output.push(object)
                        }
                    }
                }
            }

        },
        getKolory() {
            let self = this;
            fetch('/kolory').then((res) => res.json()).then((res) => self.kolory = res)//.then((res)=>self.kolory = self.kolory.filter((el)=>el.kod=='4'));
        },
        getProfile() {
            let self = this;
            fetch('/listwydane').then((res) => res.json()).then((res) => self.profile = res)
        },
        getData() {
            let self = this;
            this.getKolory();
            this.getProfile();

            setTimeout(function () {
                self.generateStrict();
            }, 3000);
            //this.getKolory().then((res) => self.getProfile()).then((res) => self.generateStrict());

        },
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
        copy() {
            this.selectElementContents(document.getElementById('tabela'));
        }

    },
    mounted() {
        let self = this;
        this.getData()

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
