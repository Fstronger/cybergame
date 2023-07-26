<template>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <div style="display: flex; gap: 16px;">
            <div
                v-for="character in characters"
                :key="character.id"
                :class="['card', { 'isActive': selectedCharacter === character.name }]"
                style="width: 33%;"
                @click="selectCharacter(character)"
            >
                <img class="card__img pers-img" :src="character.image" :alt="character.name"/>
                <h3 class="card__title">{{ character.name }}</h3>
                <p class="card__text">{{ character.description }}</p>

            </div>
        </div>

        <button class="btn btn--primary" @click="nextStep" :disabled="!selectedCharacter">Next</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedCharacter: null,
            characters: [
                {
                    id: 1,
                    name: 'Алексей Хардкорт',
                    description: 'Алексей Хардкорт - выдающийся киберинженер и главный ученый Корпорации Глобалис. Его гениальные изобретения и технологические открытия позволяют компании всегда оставаться на переднем крае прогресса. Он обладает бесконечной страстью к исследованиям, давая предпочтение работе над собой и своими экспериментами, чем общению с другими людьми. Всегда носит характерные киберпанковские очки с ультрафиолетовыми линзами.',
                    image: '/images/p1.png',
                },
                {
                    id: 2,
                    name: 'Эмилия Серебро',
                    description: 'Эмилия Серебро - преуспевающая бизнес-леди и управляющая директорка Корпорации Глобалис. Ее ум и стратегические способности позволили компании доминировать на рынке и контролировать огромные технологические ресурсы. Внешне всегда выглядит безупречно, носит стильные киберпанковские наряды и дорогостоящие кибер-аксессуары. За стальным характером скрывает тайны, которые могут потрясти всю корпорацию.',
                    image: '/images/p2.png',
                },
                {
                    id: 3,
                    name: 'Левиафан Драстик',
                    description: 'Левиафан Драстик - легендарный кибернетический боец и глава охранной службы Корпорации Глобалис. Бывший военный киборг, который стал символом силы и безжалостности компании. Всегда одет в массивную киберброню и вооружен передовым оружием. Лично участвовал во множестве операций по захвату технологических секретов у конкурирующих фракций.',
                    image: '/images/p3.png',
                },
            ],
        };
    },
    methods: {
        selectCharacter(character) {
            this.selectedCharacter = character.name;
        },
        nextStep() {
            this.$store.commit('SET_CHARACTER', this.selectedCharacter);
            this.$emit('next');
        },
    },
};
</script>
