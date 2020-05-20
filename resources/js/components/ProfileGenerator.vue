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
                opis: ''
            }, {
                kod: '2K',
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
            let self = this;
            for (let profil of this.profile) {
                for (let strona of this.strony) {
                    for (let kolor of this.kolory) {

                        let bazakod = strona.kod == '1K' ? profil.bazabiale : kolor.bazakod;
                        if(bazakod == 'O'){bazakod=profil.bazabiale}
                        let bazaopis = strona.kod == '1K' ? 'białe' : kolor.bazaopis;

                        let kod = profil.kod + '-' + bazakod + '-2-' + strona.kod + '-' + kolor.kod;
                        let opis = profil.opis + ' ' + bazaopis + ' uszczelka czarna ' + kolor.opis + ' ' + strona.opis;

                        let cenabase = strona.kod == '1K' ? profil.cena1k : profil.cena2k;

                        let cena = Math.round(parseFloat(cenabase.replace(',', '.')) * (1 + parseFloat(kolor.doplata) / 100) * 100) / 100

                        cena = cena.toString().replace('.', ',');

                        //let cena = profil.cena;

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
            fetch('/kolory').then((res) => res.json()).then((res) => self.kolory = res);
        },
        getProfile() {
            let self = this;
            fetch('/profile').then((res) => res.json()).then((res) => self.profile = res)
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
