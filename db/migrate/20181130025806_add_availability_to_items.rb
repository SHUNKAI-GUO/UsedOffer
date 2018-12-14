class AddAvailabilityToItems < ActiveRecord::Migration[5.1]
  def change
    add_column :items, :availability, :boolean
  end
end
