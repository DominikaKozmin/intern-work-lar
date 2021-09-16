<template>
  <div class="dropdown" v-if="options">
    <div class="dropdown-description">{{ description_1 }}
    <!-- Dropdown Input -->
    <input class="dropdown-input"
      :name="name"
      @focus="showOptions()"
      @blur="exit()"
      @keyup="keyMonitor"
      v-model="searchFilter"
      :disabled="disabled"
      :placeholder="placeholder_1" />

    <!-- Dropdown Menu -->
    <div class="dropdown-content"
      v-show="optionsShown">
      <div
        class="dropdown-item"
        @mousedown="selectOption(option)"
        v-for="(option, index) in filteredOptions"
        :key="index">
          {{ option.name || option.id || '-' }}
      </div>
    </div>
  </div>
  <div class="dropdown-description">{{ description_2 }}
    <!-- Dropdown Input -->
    <input class="dropdown-input"
      :name="name"
      @focus="showOptions()"
      @blur="exit()"
      @keyup="keyMonitor"
      v-model="searchFilter"
      :disabled="disabled"
      :placeholder="placeholder_2" />

    <!-- Dropdown Menu -->
    <div class="dropdown-content"
      v-show="optionsShown">
      <div
        class="dropdown-item"
        @mousedown="selectOption(option)"
        v-for="(option, index) in filteredOptions"
        :key="index">
          {{ option.name || option.id || '-' }}
      </div>
    </div>
  </div>
  <div class="dropdown-description">{{ description_3 }}
    <!-- Dropdown Input -->
    <input class="dropdown-input"
      :name="name"
      @focus="showOptions()"
      @blur="exit()"
      @keyup="keyMonitor"
      v-model="searchFilter"
      :disabled="disabled"
      :placeholder="placeholder_3" />

    <!-- Dropdown Menu -->
    <div class="dropdown-content"
      v-show="optionsShown">
      <div
        class="dropdown-item"
        @mousedown="selectOption(option)"
        v-for="(option, index) in filteredOptions"
        :key="index">
          {{ option.name || option.id || '-' }}
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  export default {
    name: 'Dropdown',
    template: 'Dropdown',
    props: {
      name: {
        type: String,
        required: false,
        default: 'dropdown',
        note: 'Input name'
      },
      options: {
        type: Array,
        required: true,
        default: [],
        note: 'Options of dropdown. An array of options with id and name',
      },
      options_1: {
        type: Array,
        required: true,
        default: [],
        note: 'Options of dropdown. An array of options with id and name',
      },
      options_2: {
        type: Array,
        required: true,
        default: [],
        note: 'Options of dropdown. An array of options with id and name',
      },
      options_3: {
        type: Array,
        required: true,
        default: [],
        note: 'Options of dropdown. An array of options with id and name',
      },
      placeholder_1: {
        type: String,
        required: false,
        default: 'Please select an option',
        note: 'Placeholder of dropdown'
      },
      placeholder_2: {
        type: String,
        required: false,
        default: 'Please select an option',
        note: 'Placeholder of dropdown'
      },
      placeholder_3: {
        type: String,
        required: false,
        default: 'Please select an option',
        note: 'Placeholder of dropdown'
      },
      description_1: {
        type: String,
        required: false,
        default: '',
        note: ''
      },
      description_2: {
        type: String,
        required: false,
        default: '',
        note: ''
      },
      description_3: {
        type: String,
        required: false,
        default: '',
        note: ''
      },
      disabled: {
        type: Boolean,
        required: false,
        default: false,
        note: 'Disable the dropdown'
      },
      maxItem: {
        type: Number,
        required: false,
        default: 6,
        note: 'Max items showing'
      }
    },
    data() {
      return {
        selected: {},
        optionsShown: false,
        searchFilter: ''
      }
    },
    created() {
      this.$emit('selected', this.selected);
    },
    computed: {
      filteredOptions() {
        const filtered = [];
        const regOption = new RegExp(this.searchFilter, 'ig');
        for (const option of this.options) {
          if (this.searchFilter.length < 1 || option.name.match(regOption)){
            if (filtered.length < this.maxItem) filtered.push(option);
          }
        }
        return filtered;
      }
    },
    methods: {
      selectOption(option) {
        this.selected = option;
        this.optionsShown = false;
        this.searchFilter = this.selected.name;
        this.$emit('selected', this.selected);
      },
      showOptions(){
        if (!this.disabled) {
          this.searchFilter = '';
          this.optionsShown = true;
        }
      },
      exit() {
        if (!this.selected.id) {
          this.selected = {};
          this.searchFilter = '';
        } else {
          this.searchFilter = this.selected.name;
        }
        this.$emit('selected', this.selected);
        this.optionsShown = false;
      },
      // Selecting when pressing Enter
      keyMonitor: function(event) {
        if (event.key === "Enter" && this.filteredOptions[0])
          this.selectOption(this.filteredOptions[0]);
      }
    },
    watch: {
      searchFilter() {
        if (this.filteredOptions.length === 0) {
          this.selected = {};
        } else {
          this.selected = this.filteredOptions[0];
        }
        this.$emit('filter', this.searchFilter);
      }
    }
  };
</script>


<style lang="scss" scoped>
  .dropdown {
    position: relative;
    display: inline-block;
    margin: auto;
    .dropdown-description{
      background: rgba(0,0,0,.6);
      display: inline-block;
      color: white;
      border-radius: 3px;
      font-size: .8rem;
      font-weight: 600;
      padding: 6px;
      min-width: 250px;
      max-width: 250px;
    }
    .dropdown-input {
      background: rgba(0,0,0,.0);
      cursor: text;
      border: none;
      color: white;
      border-radius: 3px;
      display: block;
      font-size: .9rem;
      padding: 6px;
      width: 100%;
    }
    .dropdown-content {
      position: absolute;
      background-color: #fff;
      min-width: 248px;
      max-width: 248px;
      max-height: 248px;
      border: 1px solid #e7ecf5;
      box-shadow: 0px -8px 34px 0px rgba(0,0,0,0.05);
      overflow: auto;
      z-index: 1;
      .dropdown-item {
        color: black;
        font-size: .7em;
        line-height: 1em;
        padding: 8px;
        text-decoration: none;
        display: block;
        cursor: pointer;
        &:hover {
          background-color: #e7ecf5;
        }
      }
    }
    .dropdown:hover .dropdowncontent {
      display: block;
    }
  }
</style>