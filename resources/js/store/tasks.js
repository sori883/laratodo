const state = {
    tasks: null,
    selectedTask: null
}

const getters = {
    tasks: (state) => state.tasks,
    selectedTask: (state) => state.selectedTask
}

const mutations = {
    setTasks (state, Tasks) {
        state.tasks = Tasks
    },
    setSelectedTask (state, selectedTask) {
        state.selectedTask = selectedTask
    }
}

const actions = {
    async inboxTasks (context) {
        const response = await axios.get('/api/tasks/index')
        context.commit('setTasks', response.data)
    },
    async projectTasks (context, Task_id) {
        let response

        if (typeof Task_id === 'undefined') {
            response = await axios.get('/api/tasks/index')
        } else {
            response = await axios.get(`/api/tasks/project/${Task_id}`)
        }

        context.commit('setTasks', response.data)
    },
    async delTask (context, TaskId) {
        const response = await axios.delete(`/api/tasks/destroy/${TaskId}`)
        context.commit('setTasks', response.data)
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}