<template>
  <main>
    <ParticipationHeader @create="handleCreate" />
    <ParticipationList
      ref="participationList"
      :participations="participations"
      @delete="handleDelete"
    />
  </main>
</template>

<script>
import axios from 'axios';
import ParticipationHeader from './components/ParticipationHeader';
import ParticipationList from './components/ParticipationList';

export default {
  name: 'App',
  components: {
    ParticipationHeader,
    ParticipationList
  },
  data() {
    return {
      participations: [],
      token: process.env.VUE_APP_API_KEY,
      url: process.env.VUE_APP_API_URL
    }
  },
  async mounted() {
    try {
      const response = await axios.get(this.url, {
        headers: {
          'token': this.token,
        }
      });

      response.data.forEach(item => {
        this.participations.push({
          id: item.id,
          firstname: item.first_name,
          lastname: item.last_name,
          part: item.participation,
          color: item.color
        });
      });

      this.updateChart();
    } catch (error) {
      console.error(error);
    }
  },
    
  methods: {
    async handleCreate({ data: { firstname, lastname, part, color }, onSuccess }) {
      if (firstname.trim() === '' || lastname.trim() === '' || part === '' || color === '') {  // Checks that all fields are filled in
        return;
      }

      try {
        const response = await axios.post(`${this.url}/create`,
          {
            first_name: firstname,
            last_name: lastname,
            participation: part,
            color: color,
          },
          {
            headers: {
              'token': this.token,
            }
          });

        this.participations.push({
          id: response.data.id,
          firstname: firstname,
          lastname: lastname,
          part: part,
          color: color
        });

        this.updateChart();
        onSuccess();
      } catch (error) {
        console.error(error);
      }
    },

    async handleDelete({ id, index }) {
      try {
        await axios.delete(`${this.url}/${id}`, {
          headers: {
            'token': this.token,
          }
        });

        this.participations.splice(index, 1);
        this.updateChart();
      } catch (error) {
        console.error(error);
      }
    },

    updateChart() {
      const participationList = Object.assign({}, this.$refs.participationList);
      participationList.updateChart();
    },
  },
};
</script>


