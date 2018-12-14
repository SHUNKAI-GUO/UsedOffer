class ChangeAvailabilityToBeStringInItems < ActiveRecord::Migration[5.1]
  def change
      change_column :items, :availability, :string
  end
end
